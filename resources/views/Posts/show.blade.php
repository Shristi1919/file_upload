@extends('layout')

@section('title', 'Post Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title text-primary">{{ $post->title }}</h1>
                    <p class="card-text">{{ $post->content }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-left-circle"></i> Back to Posts
                        </a>
                        <small class="text-muted">{{ $post->created_at->format('F j, Y') }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
