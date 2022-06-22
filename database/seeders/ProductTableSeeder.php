<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'hommes'
        ]);

        Category::create([
            'name' => 'femmes'
        ]);

        Product::factory()->count(30)->create()->each(function($product) {

            $category = Category::find(rand(1, 2));

            $product->category()->associate($category);

            $picturesList = Storage::allFiles('/' . $category->name . '/');

            $product->picture()->create([
                'title' => 'Default',
                'link' => $picturesList[rand(0, count($picturesList) - 1)]
            ]);

            $sizes = Size::all();
            $product->sizes()->attach($sizes);

            $product->save();
        });
    }
}
