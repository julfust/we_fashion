<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'name' => 'homme'
        ]);

        Category::create([
            'name' => 'femme'
        ]);

        Product::factory()->count(30)->create()->each(function($product) {

            $picturesList = [
                "0693445251_1_1_1.jpg",
                "0706301811_1_1_1.jpg",
                "1792455401_1_1_1.jpg",
                "3859401732_1_1_1.jpg",
                "3918402401_1_1_1.jpg",
                "3918420710_1_1_1.jpg",
                "4314509658_1_1_1.jpg",
                "4398519400_1_1_1.jpg",
                "7505410251_1_1_1.jpg",
                "9065437707_2_1_1.jpg",
                "Wxl-_19PE_juin18_3490.jpg",
                "Wxl-_Port_Jackson-031.jpg",
                "wxl-_Carpentie-011.jpg",
                "wxl-_New_Coleen-006.jpg",
                "wxl-_fideler_antic_blue5.jpg",
                "wxl-cala_punta-whiblack-081.jpg",
                "wxl-santo_amaro-whiblack-04.jpg",
                "wxl-seaside-denim_blue-01.jpg",
                "wxl-stella-guerande-02.jpg",
                "wxl-yagi-roseastripes-05.jpg"
            ];

            $category = Category::find(rand(1, 2));

            $product->category()->associate($category);

            $product->picture()->create([
                'title' => 'Default',
                'link' => $picturesList[rand(0, count($picturesList) - 1)]
            ]);

            $sizes = Size::pluck('id')->shuffle()->slice(0, rand(1, 3))->all();
            $product->sizes()->attach($sizes);

            $product->save();
        });
    }
}
