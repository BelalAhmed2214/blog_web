@extends('layouts.app')
@section('title')
    replies Management
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
        <h3>Replies</h3>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>reply</th>
                <th>Comment</th>
                <th>Post</th>
                <th>Publisher</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($replies as $reply)
                <tr>
                    <td>{{ $reply->id }}</td>
                    <td>{{ Str::limit($reply->reply, 50) }}</td> <!-- Limit description to 50 characters -->
                    <td>{{ $reply->comment->comment}}</td>
                    <td>{{ $reply->comment->post->title }}</td>
                    <td>{{ $reply->comment->user->name }}</td>
                    <td>
                        <a href="{{ route('replies.show', $reply->id) }}" class="btn btn-info">Show</a>
                        @auth
                        <!-- @can('edit replies') -->
                            <a href="{{ route('replies.edit', $reply->id) }}" class="btn btn-secondary">Edit</a>
                        <!-- @endcan -->
                        <!-- @can('delete replies') -->
                        <form action="{{ route('replies.destroy', $reply->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                        <!-- @endcan -->
                        @endauth

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
