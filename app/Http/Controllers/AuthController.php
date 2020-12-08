<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getSignupPage()
    {
        return view('auth/signup');
    }
    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new User([
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        $user -> save();
        Auth::login($user);
        return redirect()->route('product.index');
    }

    public function getSigninPage()
    {
        return view('auth/signin');
    }
    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:6'
        ]);

        if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->route('product.index');
        }
        return redirect()->back()->withErrors(['Incorrect email or password']);
    }

    public function getProfilePage()
    {
        return view('auth/profile');
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('product.index');
    }
}
