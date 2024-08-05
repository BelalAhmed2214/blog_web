@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-4">Add Post</h3>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>
        <div class="form-group form-check">
            <!-- <input type="hidden" name="is_active" value="0"> -->
            <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1">
            <label for="is_active" class="form-check-label">Active</label>
        </div>
        <button type="submit" class="btn btn-primary">Add Post</button>
    </form>
</div>
@endsection
