@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Add Comment</h3>
    <form action="{{route('comments.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="hidden" name="post_id" value="{{$post->id}}">
            <textarea name="comment" id="comment" class="form-control" ></textarea>
            @error('comment')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
</div>
@endsection
