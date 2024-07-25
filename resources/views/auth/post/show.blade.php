@extends('layouts.auth')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="{{asset('assets/auth/plugins/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css')}}" rel="stylesheet" />

@endsection


@section('title', 'View Post')

@section('content')
    <div class="content-wrapper">
        <div class="content">


            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>View Post</h2>

                 
                    
                </div>
                <div class="card-body">
                    @if ($post)
                        <table class="table" id="posts">
                            <tbody>
                                <tr>
                                    <th scope="col">Title</th>
                                    <td>{{$post->title}}</td>

                                    </tr>

                                    <tr>
                                    <th scope="col">Description</th>
                                    <td>{{$post->description}}</td>
                                </tr>

                                <tr>
                                    <th scope="col">Category</th>
                                    <td>{{$post->category->name}}</td>
                                    <tr>
                                    </tr>

                                    <th scope="col">Username</th>
                                    <td>{{$post->user->name}}</td>
                                 </tr>

                                    <tr>
                                    <th scope="col">Status</th>
                                    <td>{{$post->status===1?'Published':'Draft'}}</td>

                                   
                                    </tr>
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
