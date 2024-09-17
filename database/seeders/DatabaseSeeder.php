<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transcation;  // Pastikan model Transcation diimport dengan benar

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
        $this->call(TranscationSeeder::class);  // Panggil TranscationSeeder
        $this->call(TranscationDetailSeeder::class);
    }
}