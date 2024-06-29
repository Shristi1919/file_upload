@extends('layout')
@section('title', 'Product Details')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title text-primary">{{ $product->name }}</h2>
                    <div class="mb-4">
                        <div class="d-flex justify-content-between">
                            <strong>Description:</strong>
                            <span>{{ $product->description }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong>Price:</strong>
                            <span>RS:{{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <strong>Stock:</strong>
                            <span>{{ $product->stock }}</span>
                        </div>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left-circle"></i> Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
