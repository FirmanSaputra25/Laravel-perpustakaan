<?php

namespace Database\Seeders;

use App\Models\Member;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for($i=0; $i < 20; $i++){
            $member = new Member;

            $member->name = $faker->name;
            $member->gender = $faker->randomElement(['L' , 'P']);
            $member->phone_number = '+62 '.$faker->randomNumber(8);
            $member->address = $faker->address;
            $member->email = $faker->email;

            $member->save();

        }

    }
}

