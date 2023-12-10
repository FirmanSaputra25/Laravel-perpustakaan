<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
       $this->call(AuthorSeeder::class);
       $this->call(BookSeeder::class);
       $this->call(CatalogSeeder::class);
       $this->call(MemberSeeder::class);
       $this->call(PublisherSeeder::class);
       $this->call(TranscationSeeder::class);
       $this->call(TranscationDetailSeeder::class);
       $this->call(DB::class);

    }
}
