<!-- resources/views/products/show.blade.php -->

@extends('layout')

@section('content')
    <div class="container">
        <h2>Product Details</h2>
        <div>
            <strong>Name:</strong> {{ $product->name }} <br>
            <strong>Description:</strong> {{ $product->description }} <br>
            <strong>Price:</strong> {{ $product->price }} <br>
            <strong>Stock:</strong> {{ $product->stock }} <br>
        </div>
        <br>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
    </div>
@endsection
