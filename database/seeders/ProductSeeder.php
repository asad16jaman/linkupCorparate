<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create();
        $faker->addProvider(new FakerPicsumImagesProvider($faker));
       
       
        for($i=0;$i<7;$i++){

            $imageName = $faker->image(storage_path('app/public/product'), 800, 600, false);
            
           $product =  Product::create([
                'category_id' => Category::inRandomOrder()->first()->id,
                'name' => $faker->name(),
                'description' => $faker->sentence($faker->numberBetween(6,10)),
                'logn_description' => $faker->sentence($faker->numberBetween(20,25)),
                
            ]);



            ProductImage::create([
                    'img' => 'product/' . $imageName, 
                    'product_id' => $product->id
            ]);

            
            


        }
    }
}
