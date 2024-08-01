@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Pending Comments</h1>
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Comment</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->comment }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>
                    <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.comments.reject', $comment) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Reject</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection



