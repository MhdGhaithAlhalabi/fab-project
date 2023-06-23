<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware(['auth'])->only('index');
    }

    // Actions
    public function index()
    {
        $title = 'Store';

        $user = Auth::user();
        $categories_qty = Category::all()->count();
        $products_qty = Product::all()->count();
        $carts_qty = Order::all()->count();
        $users_qty = User::all()->count();


        // Return response: view, josn, redirect, file

        return view('dashboard.index', [
            'user' => $user->name,
            'title' => $title,
            'category' => $categories_qty,
            'product' => $products_qty,
            'cart' => $carts_qty,
            'user' => $users_qty,


        ]);
    }
}
