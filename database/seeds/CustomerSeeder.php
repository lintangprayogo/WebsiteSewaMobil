<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $person   = new Faker\Provider\id_ID\Person($faker);
         for ($i = 0; $i < 10; $i++) {
             Customer::create([
                    'name'=>$faker->name,
                    'email'=>$faker->email,
                    "address"=>$faker->address,
                    "phone"=>$faker->tollFreePhoneNumber,
                    "nik"=>$person->nik()
                 
               ]);
           }

    }
}
