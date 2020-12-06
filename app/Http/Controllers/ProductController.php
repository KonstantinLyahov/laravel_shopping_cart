<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getIndexPage()
    {
        $products = Product::paginate(6);
        return view('shop/index', ['products' => $products]);
    }
}
