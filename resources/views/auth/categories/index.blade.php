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


@section('title', 'Categories')

@section('content')
    <div class="content-wrapper">
        <div class="content">


            <!-- Masked Input -->
            <div class="card card-default">
                <div class="card-header">
                    <h2>Categories</h2>
                    
                </div>
                <div class="card-body">
                    @if (count($categories) > 0)
                        <table class="table" id="posts">
                            <thead>
                                <tr>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Created At</th>
                           

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->created_at->diffforHumans() }}</td>
                                        
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @else
                        <h3 class="text-center text-danger">No Category found.</h3>


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
