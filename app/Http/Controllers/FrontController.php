<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

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

    public function show(int $id) {

        $product = Product::find($id);

        return view('shared.show', ['product' => $product]);
    }
}
