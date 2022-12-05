<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('villages')->insert([
            [
                'name' => 'Dawai',
            ],
            [
                'name' => 'Serui',
            ],
            [
                'name' => 'Windesi',
            ],
            [
                'name' => 'Tindaret',
            ],
            [
                'name' => 'Waita',
            ],
            [
                'name' => 'Ambai',
            ],
            [
                'name' => 'Dorau',
            ],
            [
                'name' => 'Awunawai',
            ],
            [
                'name' => 'Anotaurei',
            ],
            [
                'name' => 'Mananinin',
            ],
            [
                'name' => 'Tatui',
            ],
            [
                'name' => 'Korombobi',
            ],
            [
                'name' => 'Nunsembai',
            ],
            [
                'name' => 'Mereruni',
            ],
            [
                'name' => 'Aiepi',
            ],
            [
                'name' => 'Natabui',
            ],
        ]);
    }
}
