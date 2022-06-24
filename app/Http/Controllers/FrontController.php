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

        $products = Product::paginate(6);

        return view('front.index', ['products' => $products]);
    }

    public function show(int $id) {

        $product = Product::find($id);

        return view('shared.show', ['product' => $product]);
    }

    public function showPromotion() {

        $products = Product::where('isPromoted', 1)->paginate(6);

        return view('front.index', ['products' => $products]);
    }

    public function showProductByCategory(string $category) {

        $category = Category::where('name', $category)->first();
        $products = Product::where('category_id', $category->id)->paginate(6);

        return view('front.index', ['products' => $products]);
    }
}
