<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
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

            $imageName = $faker->image(storage_path('app/public/service'), 800, 600, false);
            
            Category::create([
                'name' => $faker->sentence($faker->numberBetween(6,10)),
                'description' => $faker->paragraph(),
                'img' => 'service/' . $imageName, 
            ]);

        }
    }
}
