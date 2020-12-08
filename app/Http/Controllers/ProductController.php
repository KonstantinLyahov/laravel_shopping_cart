<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getIndexPage()
    {
        $products = Product::paginate(6);
        return view('shop/index', ['products' => $products]);
    }
    public function getAddToCart(Request $request, $id)
    {
        $product = Product::find($id);
        $oldCart = session('cart') ? session('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        session(['cart' => $cart]);
        return redirect()->route('product.index');
    }
    public function getShoppingCartPage()
    {
        if (!session('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = session('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);    
    }
}
