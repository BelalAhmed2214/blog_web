@extends('layouts.app')
@section('title')
    Comments Management
@endsection
@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Comments</h3>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Comment</th>
                <th>Post</th>
                <th>Publisher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ Str::limit($comment->comment, 50) }}</td> <!-- Limit description to 50 characters -->
                    <td>{{ $comment->post->title }}</td>
                    <td>{{ $comment->user->name }}</td>
                    <td>
                        <a href="{{ route('comments.show', $comment->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('reply.create', $comment->id) }}" class="btn btn-danger">Reply</a>
                        
                        @auth
                        @can('edit comments')
                            <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-secondary">Edit</a>
                        @endcan
                        @can('delete comments')
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        @endcan
                        @endauth

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
