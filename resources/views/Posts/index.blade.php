@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>List of Posts</h2>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
            </div>
        </div>

        @if(Session::has('success_message'))
            <script>
                toastr.success("{{ Session::get('success_message') }}", 'Success');
            </script>
        @endif

        <form method="GET" action="{{ route('posts.index') }}" class="mb-3">
            <div class="row">
                <div class="col-lg-3">
                    <input type="text" name="search" class="form-control" placeholder="Title" value="{{ request()->query('search') }}">
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-danger">Reset</a>
                </div>
            </div>
        </form>

        <!-- Posts Table -->
        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No posts found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $posts->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
@endsection
