<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\post\CreateRequest;
use App\Http\Requests\Auth\post\UpdateRequest;
use App\Models\category;
use App\Models\gallery;
use App\Models\post;
use App\Models\tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminPostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        $tags = tags::all();
        return view('admin.post.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        try {
            DB::beginTransaction();

            $fileName = null;
            if ($file = $request->file('file')) {
                $fileName = $this->uploadFile($file);
                $gallery = $this->storeImage($fileName);
            }

            $post = Post::create([
                'gallery_id' => $gallery->id ?? null,
                'user_id' => Auth::guard('admin')->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'status' => $request->status,
                'category_id' => $request->category,
            ]);

            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }

            DB::commit();
            Session::flash('alert-success', 'Post created successfully');

            return redirect()->route('admin.post.index')->with('success', 'Post created successfully');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->withErrors($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tags::all();
        return view('admin.post.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Post $post)
    {
        if ($file = $request->file('file')) {
            $imageName = null;
            if ($post->gallery) {
                $imageName = $post->gallery->image;
                $imagePath = public_path('storage/auth/posts/');

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
            'user_id' => Auth::guard('guardName')('admin')->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'category_id' => $request->category,
        ]);

        foreach ($request->tags as $tag) {
            $post->tags()->attach($tag);
        }

        Session::flash('alert-success', 'Post updated successfully!');
        return to_route('admin.post.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);

        if (!$post) {
            abort(404);
        }

        $post->tags()->detach();
        $post->delete();

        Session::flash('alert-success', 'Post deleted successfully!');
        return to_route('admin.post.index');
    }

    private function uploadFile($file)
    {
        $fileName = rand(100, 1000) . time() . $file->getClientOriginalName();
        $filePath = public_path('/storage/auth/posts/');
        $file->move($filePath, $fileName);
        return $fileName;
    }

    private function storeImage($fileName)
    {
        $gallery = gallery::create([
            'image' => $fileName,
            'type' => Gallery::POST_IMAGE,
        ]);
        return $gallery;
    }
}

