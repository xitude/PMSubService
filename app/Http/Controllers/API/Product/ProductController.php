<?php

namespace App\Http\Controllers\API\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PMC\Product\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return request()->json($products);
    }
}
