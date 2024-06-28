@extends('layout')

@section('content')
    <div class="container">
        <h2>Edit Post</h2>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}">
                @if ($errors->has('title'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control">{{ old('content', $post->content) }}</textarea>
                @if ($errors->has('content'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
@endsection
