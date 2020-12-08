<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class CheckoutController extends Controller
{
    public function createSession(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_API_KEY'));
        $checkout_session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'unit_amount' => $request['unit_amount']*100,
                    'product_data' => [
                        'name' => 'Books purchase',
                    ],
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' =>  route('checkout.success'),
            'cancel_url' => route('checkout.cancel'),
        ]);
        return response()->json(['id' => $checkout_session->id]);
    }
    public function successPage()
    {
        return view('shop/checkout-result', ['result' => 'success']);
    }
    public function cancelPage()
    {
        return view('shop/checkout-result', ['result' => 'cancel']);
    }
}
