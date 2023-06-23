<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {

    }

    public function show(Category $category)
    {
        if ($category->status != 'active') {
            abort(404);
        }

        return view('front.categories.show', compact('category'));
    }
}
