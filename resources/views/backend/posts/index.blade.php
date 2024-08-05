@extends('layouts.app')
@section('title')
    Posts Management
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
        <h3>Posts</h3>
        @can('create posts')
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Add Post</a>
        @endcan
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->description, 50) }}</td>
                    <td>{{ $post->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info">Show</a>
                        @auth
                            <!-- @can('create comments')
                            <a href="{{ route('comment.create',$post->id) }}" class="btn btn-primary">Comment</a>
                            @endcan -->
                            @can('edit posts')
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                            @endcan
                            @can('delete posts')
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
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
