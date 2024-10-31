<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hobi = [
            ['hobi' => 'Futsal'],
            ['hobi' => 'Sepak Bola'],
            ['hobi' => 'Badminton'],
            ['hobi' => 'Bermain Basket'],
            ['hobi' => 'Bermain Voli'],
            ['hobi' => 'Lari'],
            ['hobi' => 'Camping'],
            ['hobi' => 'Berenang'],
            ['hobi' => 'Bernyanyi'],
            ['hobi' => 'Membaca'],
        ];
        // masukkan data ke database
        DB::table('hobis')->insert($hobi);
    }
}
