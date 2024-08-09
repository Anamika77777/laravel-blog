@extends('layouts.auth')
@section('title', 'Edit Post | Dashboard')

@section('styles')

    <link rel="stylesheet" href="{{ asset('assets/auth/css/multi-dropdown.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content">


            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Post</h2>


                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('post.update', $post->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}"
                                placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" id="" cols="30" rows="3"
                                placeholder="Description">{{ old('description', $post->description) }}</textarea>
                        </div>

                        {{-- <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="" disabled selected>Choose Option</option>
                               
                                <option @selected(old('status', $post->status)==0) value="0">Draft</option>
                            </select>
                        </div> --}}

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="" disabled selected>Choose Option</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option 
                                            value="{{ $category->id }}" 
                                            @if(old('category') == $category->id || (isset($post) && $post->category_id == $category->id)) 
                                                selected 
                                            @endif
                                        >
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label>Tags</label>
                            <select name="tags[]" class="form-control selectpicker" multiple data-live-search="true">
                                <option value="" disabled selected>Choose Option</option>
                                @if (count($tags) > 0)
                                    @foreach ($tags as $tag)
                                        <option 
                                            value="{{ $tag->id }}" 
                                            @if((is_array(old('tags')) && in_array($tag->id, old('tags'))) || (isset($post) && $post->tags->contains($tag->id))) 
                                                selected 
                                            @endif >
                                            {{ $tag->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="file" value="{{ old('file') }}">
                        </div>
                        

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/auth/js/multi-dropdown.js') }}"></script>

@endsection