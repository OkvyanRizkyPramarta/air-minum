<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            [
                'name' => 'Kabupaten Biak Numfor',
            ],
            [
                'name' => 'Kabupaten Jayapura',
            ],
            [
                'name' => 'Kabupaten Jayawijaya',
            ],
            [
                'name' => 'Kabupaten Merauke',
            ],
            [
                'name' => 'Kabupaten Mimika',
            ],
            [
                'name' => 'Kabupaten Nabire',
            ],
            [
                'name' => 'Kabupaten Paniai',
            ],
            [
                'name' => 'Kabupaten Puncak Jaya',
            ],
            [
                'name' => 'Kabupaten Kepulauan Yapen',
            ],
            [
                'name' => 'Kota Jayapura',
            ],
            [
                'name' => 'Kabupaten Sarmi',
            ],
            [
                'name' => 'Kabupaten Keerom ',
            ],
            [
                'name' => 'Kabupaten Yahukimo',
            ],
            [
                'name' => 'Kabupaten Pegunungan Bintang',
            ],
            [
                'name' => 'Kabupaten Tolikara',
            ],
            [
                'name' => 'Kabupaten Boven Digoel',
            ],
            [
                'name' => 'Kabupaten Mappi',
            ],
            [
                'name' => 'Kabupaten Asmat',
            ],
            [
                'name' => 'Kabupaten Waropen',
            ],
            [
                'name' => 'Kabupaten Supiori',
            ],
            [
                'name' => 'Kabupaten Mamberamo Raya',
            ],
            [
                'name' => 'Kabupaten Mamberamo Tengah',
            ],
            [
                'name' => 'Kabupaten Yalimo',
            ],
            [
                'name' => 'Kabupaten Lanny Jaya',
            ],
            [
                'name' => 'Kabupaten Nduga',
            ],
            [
                'name' => 'Kabupaten Puncak',
            ],
            [
                'name' => 'Kabupaten Dogiyai',
            ],
            [
                'name' => 'Kabupaten Intan Jaya',
            ],
            [
                'name' => 'Kabupaten Deiyai',
            ],
        ]);
    }
}
