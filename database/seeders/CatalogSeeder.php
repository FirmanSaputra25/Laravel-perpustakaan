<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use App\Models\Catalog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i=0; $i<4; $i++) {
            $catalog = new Catalog;
            $catalog->name = 'Buku '.$faker->name;
            $catalog->save();
        }
    }
}