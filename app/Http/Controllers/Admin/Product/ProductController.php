<?php

namespace App\Http\Controllers\Admin\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PMC\Product\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function show($slug)
    {
        $product = Product::findBySlugOrFail($slug);

        return view('admin.products.show', compact('product'));
    }
}
