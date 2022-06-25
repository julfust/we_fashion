<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function __construct()
    {
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('name', 'id')->all();
            $view->with('categories', $categories);
        });
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(15);

        return view('back.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();

        return view(
            'back.product.edit', 
            [
                'product' => null, 
                'categories' => $categories, 
                'sizes' => $sizes,
                'productPictureLink' => null, 
                'productCategoryId' => null, 
                'checkedSizes' => [],
                'isPublished' => false,
                'isPromoted' => false
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $productRequest)
    {
        $product = Product::create($productRequest->all());
        $product->sizes()->attach($productRequest->sizes);

        // Check if there's new file
        if($productRequest->file('picture')) {

            $productCategory = $product->category ? $product->category->name : 'undefined-category';

            // Get uploaded file data
            $file = $productRequest->file('picture');
            $filename = date('YmdHi').$file->getClientOriginalName();

            // Registrer new file into storage
            $file->move(public_path('images/' . $productCategory), $filename);

            // Set new file name of updated product into database
            $product->picture()->create(['link' => $productCategory . '/' . $filename]);
        }

        return redirect()->route('products.index')->with('message', 'Produit ajouté !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('shared.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        $sizes = Size::all();
        
        $checkedSizes = [];

        foreach($product->sizes as $size) {
            $checkedSizes[] = $size->id;
        }

        return view(
            'back.product.edit',
            [
                'product' => $product, 
                'categories' => $categories, 
                'sizes' => $sizes,
                'productPictureLink' => $product->picture->link, 
                'productCategoryId' => $product->category ? $product->category->id : null, 
                'checkedSizes' => $checkedSizes,
                'isPublished' => $product->isPublished === 1,
                'isPromoted' => $product->isPromoted === 1
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $productRequest, $id)
    {
        $product = Product::find($id);
        $product->update($productRequest->all());

        // Check if there's new file
        if($productRequest->file('picture')) {

            $productCategory = $product->category ? $product->category->name : 'undefined-category';

            // Get uploaded file data
            $file = $productRequest->file('picture');
            $filename = date('YmdHi').$file->getClientOriginalName();

            // Registrer new file into storage
            $file->move(public_path('images/' . $productCategory), $filename);

            // Delete old file from storage
            Storage::delete('/' . $product->picture->link);

            // Set new file name of updated product into database
            $product->picture()->update(['link' => $productCategory . '/' . $filename]);
        }

        $product->sizes()->sync($productRequest->sizes);

        return redirect()->route('products.index')->with('message', 'Modification enregistré');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('message', "Produit supprimé");
    }
}
