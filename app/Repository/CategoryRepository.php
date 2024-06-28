<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::all();
    }

    public function findById($id)
    {
        return Category::findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $Category = Category::findOrFail($id);
        $Category->update($data);
        return $Category;
    }

    public function delete($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
    }

    public function query()
    {
        return Category::query();
    }
}
