<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
         for ($i = 0; $i < 10; $i++) {
             User::create([
                    'name'=>$faker->name,
                    'email'=>$faker->email,
                    "password"=>Hash::make("12345678"),
                    "remember_token"=>str_random(10)
               ]);
           }





    }
}
