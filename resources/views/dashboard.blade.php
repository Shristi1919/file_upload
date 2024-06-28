@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Welcome to Dashboard</h1>
        {{-- <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td><a href="{{ route('logout') }}">Logout</a></td>
                </tr>
            </tbody>
        </table> --}}
    </div>
@endsection
