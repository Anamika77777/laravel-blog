@extends('layouts.auth')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />

    <style>
      #outer{
        text-align: center;
      }
      .inner{
        display: inline-block;
      }
    </style>
@endsection


@section('title', 'Post')

@section('content')
    <div class="content-wrapper">
        <div class="content">


            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Create Post</h2>

                    @if (Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong>Success!</strong> {{ session::get('alert-success') }}
                    </div>
                    @endif
                    
                </div>
                <div class="card-body">
                    @if (count($posts) > 0)
                        <table class="table" id="posts">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td><img src="{{ asset('storage/auth/posts/'). '/' .$post->gallery->image }}" alt="Post Image" style="width:80px; height:40px"></td>
                                        <td>{{ \Illuminate\Support\Str::limit($post->title, 15, '...') }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($post->description, 15, '...') }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>{{ $post->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td class="outer">
                                            <a href="{{route('post.show', $post->id)}}"><i class="bi bi-eye-fill inner"></i></a>
                                            <a href="{{route('post.edit', $post->id)}}"><i class="bi bi-pencil-fill inner"></i></a>
                                            <form method="POST" action="{{route('post.destroy', $post->id)}}" class="inner">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="bi bi-trash"></i> </button>
                                      </td>
                                        </form>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center text-danger">No Post found.</h3>


                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
<script src="{{asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>

<script>
$(document).ready(function(){
  $('#posts').DataTable();
});
</script>
@endsection