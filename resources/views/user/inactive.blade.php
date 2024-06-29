@extends('layouts.app')

@section('title', 'Registration')

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2>User Inactive</h2>
                    </div>
                    <div class="card-body">
                        <p class="text-center mb-0">
                            Already have an account? <a href="{{ route('login') }}">Login Here</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
