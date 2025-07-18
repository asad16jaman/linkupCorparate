<?php

namespace Database\Seeders;

use App\Models\Client;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ClientSeeder extends Seeder
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

            $imageName = $faker->image(storage_path('app/public/client'), 800, 600, false);
            $arr = ['junior programmer','senior programmer','ceo','software engineer','programmer'];
            Client::create([
                'name' => $faker->name,
                'note' => $faker->sentence($faker->numberBetween(6,10)),
                'profession' => $arr[$faker->numberBetween(0,4)],
                'photo' => 'client/' . $imageName, 
            ]);

        }
       
    }
}
