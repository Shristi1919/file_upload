<!-- resources/views/products/create.blade.php -->

@extends('layout')
@if (Session::has('message'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif

@section('content')
    <div class="container">
        <h2>Create New Product</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" >
                @if ($errors->has('name'))
                <span class="text-danger">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif

            </div>

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                    <span class="text-danger">
                        <strong>{{ $errors->first('category_id') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" >
                @if ($errors->has('price'))
                <span class="text-danger">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
            @endif

            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" class="form-control" >
                @if ($errors->has('stock'))
                <span class="text-danger">
                    <strong>{{ $errors->first('stock') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Create Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </form>
    </div>
@endsection


