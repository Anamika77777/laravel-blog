@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <style>
      #outer {
        text-align: center;
      }
      .inner {
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
                        <strong>Success!</strong> {{ Session::get('alert-success') }}
                    </div>
                    @endif
                </div>
                <div class="card-body">
                    @if (count($posts) > 0)
                        <table class="table" id="Tablepost">
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
                                        <td><img src="{{$post->gallery->image }}" alt="Post Image" style="width:80px; height:40px"></td>
                                        <td>{{ \Illuminate\Support\Str::limit($post->title, 15, '...') }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($post->description, 15, '...') }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->user->name }}</td>
                                        <td>
                                            <select class="form-control status-select" data-id="{{ $post->id }}">
                                                <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </td>
                                        <td id="outer">
                                            <a href="{{ route('admin.post.show', $post->id) }}"><i class="bi bi-eye-fill inner"></i></a>
                                            <a href="{{ route('admin.post.edit', $post->id) }}"><i class="bi bi-pencil-fill inner"></i></a>
                                            <form method="POST" action="{{ route('admin.post.destroy', $post->id) }}" class="inner">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('assets/auth/plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}"></script>
<script>
$(document).ready(function(){
  $('#Tablepost').DataTable();

  $('.status-select').on('change', function(){
      var postId = $(this).data('id');
      var status = $(this).val();
      
      console.log('Changing status of post ID: ' + postId + ' to ' + status);

      $.ajax({
          url: '/admin/post/' + postId + '/status',
          method: 'PATCH',
          data: {
              _token: '{{ csrf_token() }}',
              status: status
          },
          success: function(response) {
              console.log(response);
              alert('Status updated successfully!');
          },
          error: function(response) {
              console.log(response);
              alert('Failed to update status.');
          }
      });
  });
});
</script>
@endsection


