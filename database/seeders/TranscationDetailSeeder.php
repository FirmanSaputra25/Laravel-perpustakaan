<?php

namespace Database\Seeders;

use App\Models\TranscationDetail;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranscationDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i=0; $i < 20; $i++){
          DB::table('transcation_details')->insert([

            'transcation_id'=>$faker->numberBetween(1,20),
            'book_id'=>$faker->numberBetween(1,20),
            'qty'=>$faker->numberBetween(1,30)
           ]);

    }
}
}