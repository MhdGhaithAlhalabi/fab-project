<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $featured = Product::where('featured', 1)->with('category')->active()
            //->latest()
            ->limit(3)
            ->get();
        $popular = Product::where('popular', 1)->with('category')->active()
            //->latest()
            ->limit(8)
            ->get();
        $new = Product::with('category')->active()
            ->latest()
            ->limit(3)
            ->get();
        $products = Product::with('category')->active()
            ->inRandomOrder()
            ->limit(3)
            ->get();
        $rating = Product::with('category')->active()
            ->orderBy('rating', 'desc')
            ->limit(3)
            ->get();
        $setting = Setting::checkSettings();
        return view('front.home', compact('new', 'products', 'rating', 'popular', 'featured', 'setting'));
    }
    public function about()
    {
        return view('front.about');
    }
    public function faqs()
    {
        return view('front.faqs');
    }
    public function contactUs()
    {
        return view('front.contactUs');
    }
    public function notfound()
    {
        return view('front.notfound');
    }
    public function mailsuccess()
    {
        return view('front.mailsuccess');
    }
}
