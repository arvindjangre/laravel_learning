<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i = 1; $i < 101; $i++) {
            $customer = new Customer;
            $customer->name = $faker->name;
            $customer->email = $faker->email;
            $customer->address = $faker->address;
            $customer->gender = "M";
            $customer->state = $faker->state;
            $customer->country = substr($faker->country, 0, 10); 
            $customer->dob = $faker->date;
            $customer->password = $faker->password;
            $customer->save();

            echo "Inserted Customer: " . $i ;
        }
    }
}
