<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;

    public function __construct(ProductRepository $productRepository,CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }


    public function index(Request $request)
    {
        $search = $request->query('search');
        $category_id = $request->query('category_id');
        $min_price = $request->query('min_price');

        $products = $this->productRepository->getFilteredProducts($search, $category_id, $min_price);

        $categories = $this->categoryRepository->all();

        return view('products.index', compact('products', 'search', 'category_id', 'min_price', 'categories'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
        ], [
            'category_id.required' => 'Please select a category.',
        ]);

       $product=$this->productRepository->create($request->all());
       $this->productRepository->categories($product, $request->input('category_id'));

        Session::flash('success_message', 'Product created successfully');

        return redirect('/products');

    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productRepository->findById($id);
        $categories = $this->categoryRepository->all();

        $product->load('categories');

        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required',
        ], [
            'category_id.required' => 'Please select a category.',
        ]);

        $product= $this->productRepository->update($id, $request->all());
        $this->productRepository->categories($product, $request->input('category_id'));

        Session::flash('success_message', 'Product updated successfully');

        return redirect('/products');
    }

    public function destroy($id)
    {
        $this->productRepository->delete($id);

        Session::flash('success_message', 'Product Deleted successfully');

        return redirect('/products');
    }
}
