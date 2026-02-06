<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Setting;


class CoffeeLoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'role'=>'required'
        ]);

        // ===== ADMIN LOGIN =====
        if ($request->role === 'admin') {

            // optional hardcoded admin
            if ($request->email === 'admin@coffee.com' && $request->password === 'admin123') {

                $admin = User::firstOrCreate(
                    ['email'=>'admin@coffee.com'],
                    [
                        'name'=>'Admin',
                        'password'=>bcrypt('admin123'),
                        'role'=>'admin'
                    ]
                );

                Auth::login($admin);
                return redirect()->route('admin.dashboard');
            }

            return back()->with('error','Invalid admin login');
        }

        // ===== CUSTOMER LOGIN =====
        if (Auth::attempt($request->only('email','password'))) {

            if(auth()->user()->role !== 'customer'){
                Auth::logout();
                return back()->with('error','This is not a customer account');
            }

            // ✅ CUSTOMER GOES TO HOME PAGE
            return redirect()->route('shop.home');
        }

        return back()->with('error','Invalid login details');
    }
   public function showLogin()
{
    $products = Product::latest()->take(6)->get();
    $reviews = Review::latest()->take(3)->get();
    $shop = Setting::first(); // ⭐ THIS IS MISSING

    return view('auth.coffee-login', compact('products','reviews','shop'));
}

}
