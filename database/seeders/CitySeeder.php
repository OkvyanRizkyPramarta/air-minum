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
                'id' => '1',
                'name' => 'Kabupaten Biak Numfor',
                'ocean_area' => '3900',
                'mainland_area' => '2600',
                'total_area' => '6502',
                // 'oap' => '63576',
                'year' => '2020',
            ],
            [
                'id' => '2',
                'name' => 'Kabupaten Jayapura',
                'ocean_area' => '697',
                'mainland_area' => '11150',
                'total_area' => '11854',
                // 'oap' => '68868',
                'year' => '2020',
            ],
            [
                'id' => '3',
                'name' => 'Kabupaten Keerom ',
                'ocean_area' => '0',
                'mainland_area' => '8390',
                'total_area' => '8390',
                // 'oap' => '16283',
                'year' => '2020',
            ],
            [
                'id' => '4',
                'name' => 'Kabupaten Kepulauan Yapen',
                'ocean_area' => '4664',
                'mainland_area' => '2050',
                'total_area' => '6714',
                // 'oap' => '47554',
                'year' => '2020',
            ],
            [
                'id' => '5',
                'name' => 'Kabupaten Mamberamo Raya',
                'ocean_area' => '1688',
                'mainland_area' => '23813',
                'total_area' => '25502',
                // 'oap' => '15624',
                'year' => '2020',
            ],
            [
                'id' => '6',
                'name' => 'Kabupaten Sarmi',
                'ocean_area' => '2626',
                'mainland_area' => '17742',
                'total_area' => '20368',
                // 'oap' => '13575',
                'year' => '2020',
            ],
            [
                'id' => '7',
                'name' => 'Kabupaten Supiori',
                'ocean_area' => '2107',
                'mainland_area' => '678',
                'total_area' => '2785',
                // 'oap' => '12761',
                'year' => '2020',
            ],
            [
                'id' => '8',
                'name' => 'Kabupaten Waropen',
                'ocean_area' => '1216',
                'mainland_area' => '10977',
                'total_area' => '12193',
                // 'oap' => '15053',
                'year' => '2020',
            ],
            [
                'id' => '9',
                'name' => 'Kota Jayapura',
                'ocean_area' => '469',
                'mainland_area' => '935',
                'total_area' => '1345',
                // 'oap' => '19514',
                'year' => '2020',
            ],
        ]);
    }
}
