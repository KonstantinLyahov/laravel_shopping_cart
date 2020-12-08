<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'getIndexPage'])->name('product.index');

Route::get('/add-to-cart/{id}', [ProductController::class, 'getAddToCart'])->name('product.addToCart');
Route::get('/shopping-cart', [ProductController::class, 'getShoppingCartPage'])->name('product.shoppingCart');
Route::get('/reduce/{id}/{all?}', [ProductController::class, 'reduce'])->name('shoppingCart.reduce');
Route::get('/clear', [ProductController::class, 'clearShoppingCart'])->name('shoppingCart.clear');

Route::name('checkout.')->group(function() {
	Route::post('/create-session', [CheckoutController::class, 'createSession'])->name('createSession');
	Route::get('/create-session', [CheckoutController::class, 'createSession'])->name('createSession');
	Route::get('/checkout-success', [CheckoutController::class, 'successPage'])->name('success');
	Route::get('/checkout-cancel', [CheckoutController::class, 'cancelPage'])->name('cancel');
});


Route::middleware('guest')->group(function(){
	Route::get('/signup', [AuthController::class, 'getSignupPage'])->name('signup.page');
	Route::post('/signup', [AuthController::class, 'postSignup'])->name('signup.post');

	Route::get('/signin', [AuthController::class, 'getSigninPage'])->name('signin.page');
	Route::post('/signin', [AuthController::class, 'postSignin'])->name('signin.post');
});

Route::middleware('auth')->group(function(){
	Route::get('/profile', [AuthController::class, 'getProfilePage'])->name('profile.page');
	Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});