<?php

namespace Database\Seeders;

use App\Models\Book;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 0; $i < 20 ; $i++){
            $book = new Book;

            $book->isbn = $faker->randomNumber(9);
            $book->title = $faker->name;
            $book->year = rand(2010 , 2023);
            $book->publisher_id = rand(1,20);
            $book->author_id = rand(1,20);
            $book->catalog_id = rand(33,36);
            $book->qty = rand(1,30);
            $book->price = rand(10000, 100000);

            $book->save();
        }
    }
}
