<?php

namespace Database\Seeders;

use App\Models\Team;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
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

            $imageName = $faker->image(storage_path('app/public/team'), 800, 600, false);
            $arr = ['junior programmer','senior programmer','ceo','software engineer','programmer'];
            Team::create([
                'name' => $faker->sentence($faker->numberBetween(6,10)),
                'designation' => $arr[$faker->numberBetween(0,4)],
                'bio' => $faker->text($maxNbChars = 200),
                'photo' => 'team/' . $imageName, 
            ]);

        }




    }
}
