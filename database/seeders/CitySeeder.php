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
                'ocean_area' => '3900',
                'mainland_area' => '2600',
                'total_area' => '6502',
                // 'oap' => '63576',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Jayapura',
                'ocean_area' => '697',
                'mainland_area' => '11150',
                'total_area' => '11854',
                // 'oap' => '68868',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Jayawijaya',
                'ocean_area' => '0',
                'mainland_area' => '7030',
                'total_area' => '7030',
                // 'oap' => '186898',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Merauke',
                'ocean_area' => '5840',
                'mainland_area' => '44071',
                'total_area' => '49911',
                // 'oap' => '43546',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Mimika',
                'ocean_area' => '2781',
                'mainland_area' => '21633',
                'total_area' => '24414',
                // 'oap' => '92938',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Nabire',
                'ocean_area' => '3704',
                'mainland_area' => '11112',
                'total_area' => '14817',
                // 'oap' => '59252',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Paniai',
                'ocean_area' => '0',
                'mainland_area' => '6525',
                'total_area' => '6525',
                // 'oap' => '63931',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Puncak Jaya',
                'ocean_area' => '0',
                'mainland_area' => '4989',
                'total_area' => '4989',
                // 'oap' => '184448',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Kepulauan Yapen',
                'ocean_area' => '4664',
                'mainland_area' => '2050',
                'total_area' => '6714',
                // 'oap' => '47554',
                'year' => '2020',
            ],
            [
                'name' => 'Kota Jayapura',
                'ocean_area' => '469',
                'mainland_area' => '935',
                'total_area' => '1345',
                // 'oap' => '19514',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Sarmi',
                'ocean_area' => '2626',
                'mainland_area' => '17742',
                'total_area' => '20368',
                // 'oap' => '13575',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Keerom ',
                'ocean_area' => '0',
                'mainland_area' => '8390',
                'total_area' => '8390',
                // 'oap' => '16283',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Yahukimo',
                'ocean_area' => '0',
                'mainland_area' => '17152',
                'total_area' => '17152',
                // 'oap' => '229014',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Pegunungan Bintang',
                'ocean_area' => '0',
                'mainland_area' => '15682',
                'total_area' => '15682',
                // 'oap' => '61771',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Tolikara',
                'ocean_area' => '0',
                'mainland_area' => '5588',
                'total_area' => '5588',
                // 'oap' => '215813',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Boven Digoel',
                'ocean_area' => '0',
                'mainland_area' => '27108',
                'total_area' => '27108',
                // 'oap' => '14730',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Mappi',
                'ocean_area' => '786',
                'mainland_area' => '24118',
                'total_area' => '24904',
                // 'oap' => '43711',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Asmat',
                'ocean_area' => '1628',
                'mainland_area' => '31983',
                'total_area' => '33611',
                // 'oap' => '31029',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Waropen',
                'ocean_area' => '1216',
                'mainland_area' => '10977',
                'total_area' => '12193',
                // 'oap' => '15053',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Supiori',
                'ocean_area' => '2107',
                'mainland_area' => '678',
                'total_area' => '2785',
                // 'oap' => '12761',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Mamberamo Raya',
                'ocean_area' => '1688',
                'mainland_area' => '23813',
                'total_area' => '25502',
                // 'oap' => '15624',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Mamberamo Tengah',
                'ocean_area' => '0',
                'mainland_area' => '1275',
                'total_area' => '1275',
                // 'oap' => '34516',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Yalimo',
                'ocean_area' => '0',
                'mainland_area' => '1253',
                'total_area' => '1253',
                // 'oap' => '75206',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Lanny Jaya',
                'ocean_area' => '0',
                'mainland_area' => '2248',
                'total_area' => '2248',
                // 'oap' => '178646',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Nduga',
                'ocean_area' => '0',
                'mainland_area' => '2168',
                'total_area' => '2168',
                // 'oap' => '63377',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Puncak',
                'ocean_area' => '0',
                'mainland_area' => '8055',
                'total_area' => '8055',
                // 'oap' => '118390',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Dogiyai',
                'ocean_area' => '0',
                'mainland_area' => '4237',
                'total_area' => '4237',
                // 'oap' => '97697',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Intan Jaya',
                'ocean_area' => '0',
                'mainland_area' => '3922',
                'total_area' => '3922',
                // 'oap' => '71693',
                'year' => '2020',
            ],
            [
                'name' => 'Kabupaten Deiyai',
                'ocean_area' => '0',
                'mainland_area' => '537',
                'total_area' => '537',
                // 'oap' => '71008',
                'year' => '2020',
            ],
        ]);
    }
}
