<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Size::create([
            'value' => 'XS'
        ]);

        Size::create([
            'value' => 'S'
        ]);

        Size::create([
            'value' => 'M'
        ]);

        Size::create([
            'value' => 'L'
        ]);

        Size::create([
            'value' => 'XL'
        ]);
    }
}
