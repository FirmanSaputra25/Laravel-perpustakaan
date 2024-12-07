<?php
use App\Models\Peminjaman;
use Carbon\Carbon;

        function convert_date($value){
            return date ('H:i:s - d M Y' , strtotime($value));
        }


        if (!function_exists('latePeminjaman')) {
            function latePeminjaman()
            {
                return Peminjaman::where('status', false)
                    ->where('tanggal_kembali', '<', Carbon::now())
                    ->get();
            }
        }
?>