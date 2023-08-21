<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[
            [
                'name'=>'Basic Tee',
                'description'=>'Sienn | Large',
                'image'=>'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-01.jpg',
                'price'=>100
            ],
            [
                'name'=>'Nomad Tumbler',
                'description'=>'White',
                'image'=>'https://tailwindui.com/img/ecommerce-images/shopping-cart-page-01-product-03.jpg',
                'price'=>35
            ],
            [
                'name'=>'Leatherbound Daily Journal Set',
                'description'=>'Test Natural',
                'image'=>'https://tailwindui.com/img/ecommerce-images/home-page-02-product-03.jpg',
                'price'=>67
            ],
            [
                'name'=>'Billfold Wallet',
                'description'=>'Natural',
                'image'=>'https://tailwindui.com/img/ecommerce-images/home-page-04-trending-product-02.jpg',
                'price'=>75
            ]
        ];
 
        foreach($products as $key=>$value){
            Product::create($value);
        }
    }
}
