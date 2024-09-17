<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Models\Member;
use App\Models\Transcation;  // Gunakan model yang benar

class TranscationSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Ambil semua ID dari tabel members
        $memberIds = Member::pluck('id')->toArray();

        for ($i = 0; $i < 20; $i++) {
            $record = new Transcation;  // Gunakan model yang benar

            $record->member_id = $faker->randomElement($memberIds);
            $record->date_start = $faker->date();
            $record->date_end = $faker->date();
            $record->created_at = Carbon::now();
            $record->updated_at = Carbon::now();

            $record->save();
        }
    }
}