<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontController extends Controller
{
    public function __construct()
    {
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all();
            $view->with('categories', $categories);
        });
    }

    public function index() {

        $products = Product::paginate(5);

        return view('front.index', ['products' => $products]);
    }
}
