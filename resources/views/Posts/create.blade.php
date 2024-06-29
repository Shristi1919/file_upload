@extends('layout')


@section('content')
    <div class="container">
        <h2>Create New Post</h2>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control">
                @if ($errors->has('title'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control"></textarea>
                @if ($errors->has('content'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('content') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </div>
@endsection
