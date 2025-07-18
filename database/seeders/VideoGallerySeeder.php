<?php

namespace Database\Seeders;

use App\Models\VideoGallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VideoGallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for($i=0;$i<7;$i++){
            VideoGallery::create([
                'title' => $faker->sentence($faker->numberBetween(3,6)),
                'description' => $faker->text($maxBnChars=200),
                'video' => ""
            ]);

        }




    }
}
