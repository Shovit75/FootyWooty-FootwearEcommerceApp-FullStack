<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductAttribute;
use App\Models\ProductCategories;
use App\Models\ProductSubcategories;

class Seedall extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $attributes = [
            [
                'name' => 'Color',
                'options' => ["Red", "Blue", "Yellow", "Green", "Black", "White", "Orange", "Brown"]
            ],
            [
                'name' => 'Size',
                'options' => ["3", "4", "5", "6", "7", "8", "9", "10", "11", "12"]
            ]
        ];
        foreach ($attributes as $attribute) {
            ProductAttribute::create([
                'name' => $attribute['name'],
                'options' => json_encode($attribute['options']),
            ]);
        }

        $prodcat = [
            [
                'name' => 'Men',
                'image' => 'mencat.jpg'
            ],
            [
                'name' => 'Women',
                'image' => 'womencat.jpg'
            ]
        ];
        foreach ($prodcat as $p) {
            ProductCategories::create([
                'name' => $p['name'],
                'image' => $p['image'],
            ]);
        }

        $prodsubcat = [
            [
                'name' => 'Casuals Men',
                'image' => 'mencasuals.jpg',
                'product_categories_id' => 1
            ],
            [
                'name' => 'Casuals Women',
                'image' => 'womencasuals.jpg',
                'product_categories_id' => 2
            ],
            [
                'name' => 'Formals Men',
                'image' => 'menformal.jpg',
                'product_categories_id' => 1
            ],
            [
                'name' => 'Formals Women',
                'image' => 'womenformals.jpg',
                'product_categories_id' => 2
            ],
            [
                'name' => 'Sports Men',
                'image' => 'mensports.jpg',
                'product_categories_id' => 1
            ],
            [
                'name' => 'Sports Women',
                'image' => 'womensports.jpg',
                'product_categories_id' => 2
            ],
        ];
        foreach ($prodsubcat as $sp) {
            ProductSubcategories::create([
                'name' => $sp['name'],
                'image' => $sp['image'],
                'product_categories_id' => $sp['product_categories_id'],
            ]);
        }

    }
}
