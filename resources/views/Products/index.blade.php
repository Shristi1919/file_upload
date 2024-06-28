@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h2>List of Products</h2>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Create New Product</a>
            </div>
        </div>

        <!-- Search Form -->
        <form method="GET" action="{{ route('products.index') }}" class="mb-3">
            <div class="row">
                <div class="col-lg-4">
                    <input type="text" name="search" class="form-control" placeholder="Search by name or description" value="{{ $search }}">
                </div>
                <div class="col-lg-2">
                    <input type="number" name="min_price" class="form-control" placeholder="Min Price" value="{{ $min_price }}">
                </div>
                <div class="col-lg-3">
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary">Search</button>
                    <a href="{{ route('products.index') }}" class="btn btn-danger">Reset</a>
                </div>
            </div>
        </form>


        <!-- Products Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center">No Products found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
