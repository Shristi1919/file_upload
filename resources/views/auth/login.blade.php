@extends('layouts.app')

@section('title', 'Login')

@section('main-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h2>Welcome Back! Login to Your Account</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('login-user') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                        </div>
                    </form>
                    <p class="text-center mb-0">
                        <a href="{{ route('register') }}">Create an Account</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
