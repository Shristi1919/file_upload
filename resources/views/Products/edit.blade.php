<!-- resources/views/products/edit.blade.php -->

@extends('layout')
@if (Session::has('message'))
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    {{ Session::get('message') }}
</div>
@endif
@section('content')
    <div class="container">
        <h2>Edit Product</h2>
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}">
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
                        <option value="{{ $category->id }}" {{ $product->categories->contains('id', $category->id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required>{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $product->price }}">
                @if ($errors->has('price'))
                <span class="text-danger">
                    <strong>{{ $errors->first('price') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" name="stock" id="stock" class="form-control" value="{{ $product->stock }}">
                @if ($errors->has('stock'))
                <span class="text-danger">
                    <strong>{{ $errors->first('stock') }}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Products</a>
        </form>
    </div>
@endsection
