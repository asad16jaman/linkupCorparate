<?php

namespace Database\Seeders;

use App\Models\Contact;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Smknstd\FakerPicsumImages\FakerPicsumImagesProvider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //


         $faker = Faker::create();
       
       
       
        for($i=0;$i<20;$i++){

             	 	 	 	 
            Contact::create([
                'name' => $faker->name,
                'phone' => $faker->phoneNumber,
                'message' => $faker->paragraph(),
                'email' => $faker->email,
                
            ]);

        }
    }
}
