<?php

namespace App\Repository;

use App\Models\Product;

class ProductRepository
{
    public function all()
    {
        return Product::all();
    }

    public function findById($id)
    {
        return Product::findOrFail($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }

    public function update($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    }

    public function query()
    {
        return Product::query();
    }

    public function categories(Product $product, $categoryIds)
    {
        $product->categories()->sync($categoryIds);
    }

    public function getFilteredProducts($search = null, $category_id = null, $min_price = null)
    {
        $query = Product::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($min_price) {
            $query->where('price', '>', $min_price);
        }

        if ($category_id) {
            $query->whereHas('categories', function ($q) use ($category_id) {
                $q->where('categories.id', $category_id);
            });
        }

        return $query->paginate(10);
    }

    public function getEloquentQuery($min_price, $category_id)
    {
        $query = Product::query();
        if ($min_price !== null) {
            $query->where('price', '>=', $min_price);
        }
        if ($category_id !== null) {
            $query->whereHas('categories', function ($q) use ($category_id) {
                $q->where('categories.id', $category_id);
            });
        }
        return $query->get();
    }

}
