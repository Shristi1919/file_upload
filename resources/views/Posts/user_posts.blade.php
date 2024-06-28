@extends('layout')

@section('content')
    <div class="container">
        <h2>Posts by User</h2>
        @if(Session::has('success_message'))
            <script>
                toastr.success("{{ Session::get('success_message') }}", 'Success');
            </script>
        @endif

        @foreach($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
