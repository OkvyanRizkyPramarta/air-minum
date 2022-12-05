<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            [
                'name' => 'Yapen Timur',
                'postal_code' => '98644',
            ],
            [
                'name' => 'Yapen Selatan',
                'postal_code' => '98616',
            ],
            [
                'name' => 'Yapen Barat',
                'postal_code' => '98648',
            ],
            [
                'name' => 'Yapen Utara',
                'postal_code' => '98645',
            ],
            [
                'name' => 'Windesi',
                'postal_code' => '98651',
            ],
            [
                'name' => 'Kepulauan Ambai',
                'postal_code' => '98653',
            ],
            [
                'name' => 'Anataurei',
                'postal_code' => '98631',
            ],
            [
                'name' => 'Kosiwo',
                'postal_code' => '98632',
            ],
        ]);
    }
}
