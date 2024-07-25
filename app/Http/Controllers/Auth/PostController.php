<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\post\CreateRequest;
use App\Http\Requests\Auth\post\UpdateRequest;
use App\Models\category;
use App\Models\gallery;
use App\Models\post;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('auth.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $tags = tags::all();
        return view('auth.post.create')->with('categories', $categories)->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {

        try {

            DB::beginTransaction();

            if ($file = $request->file('file')) {

          $fileName = $this->uploadFile($file);

           $gallery = $this->storeImage($fileName);
            }



            $post =
                post::create([
                    'gallery_id' => $gallery->id,
                    'user_id' => auth()->user()->id,
                    'title' => $request->title,
                    'description' => $request->description,
                    'status' => $request->status,
                    'category_id' => $request->category,

                ]);

            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
            DB::commit();

            Session::flash('alert-success', 'Your post has been created successfully!');

            return redirect()->route('post.index')->with('success', 'Post created successfully');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->withErrors($ex->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        // $post = post::find($id);

        // if(! $post){
        //     abort(404);
        // }

        // $post->tags()->detach();

        return view('auth.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = post::find($id);
        $categories = category::all();
        $tags = tags::all();
        return view('auth.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, post $post)
    {

        if ($file = $request->file('file')) {

            $imageName =null;
            if($post->gallery){
                $imageName = $post->gallery->image;

                $imagePath = public_path('storage/auth/post');

            if (file_exists($imagePath . $imageName)) {
               unlink($imagePath . $imageName);
            }
            }
            

          $fileName = $this->uploadFile($file);

            $post->gallery->update([
                'image' => $fileName
            ]);
        } 

        $post->update([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,

        ]);

       
        foreach ($request->tags as $tag) {
            $post->tags()->attach($tag);
        }
        Session::flash('alert-success', 'Your post has been Updated successfully!');
        return to_route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = post::find($id);

        if (!$post) {
            abort(404);
        }

        $post->tags()->detach();

        $post->delete();
        Session::flash('alert-success', 'Your post has been Deleted successfully!');


        return to_route('post.index');
    }

    private function uploadFile($file,)
    {
        $FileName = rand(100, 1000) . time() . $file->getClientOriginalName();
        $filePath = public_path('/storage/auth/posts/');
        $file->move($filePath, $FileName);
       Return $FileName;
    }

    private function storeImage($FileName)
    {
        $gallery = gallery::create([
            'image' => $FileName,
            'type' => gallery::POST_IMAGE,
        ]);
        return $gallery;
    }
}
