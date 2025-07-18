<?php

namespace Database\Seeders;

use App\Models\PhotoGallery;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class PhotoGallerySeeder extends Seeder
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

            $imageName = $faker->image(storage_path('app/public/photogallery'), 800, 600, false);
            
            PhotoGallery::create([
                'title' => $faker->sentence($faker->numberBetween(6,10)),
                'description' => $faker->paragraph(),
                'img' => 'photogallery/' . $imageName, 
            ]);

        }


    }
}
