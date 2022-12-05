<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'username' => 'superadmin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('Superadmin123!'),
                'role' => 'SuperAdmin',
                'address' => 'Jl. Surabaya Malang No 12',
                'phone_number' => '081232152152',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin Sub',
                'username' => 'adminsub',
                'email' => 'adminsub@gmail.com',
                'password' => Hash::make('Adminsub123!'),
                'role' => 'AdminSub',
                'address' => 'Jl. Surabaya Malang No 12',
                'phone_number' => '081232152152',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin PU',
                'username' => 'adminpu',
                'email' => 'adminpu@gmail.com',
                'password' => Hash::make('Adminpu123!'),
                'role' => 'AdminPU',
                'address' => 'Jl. Surabaya Malang No 12',
                'phone_number' => '081232152152',
                'created_at' => Carbon::now(),
            ],
            [
                'name' => 'Admin X',
                'username' => 'adminx',
                'email' => 'adminx@gmail.com',
                'password' => Hash::make('Adminx123!'),
                'role' => 'AdminX',
                'address' => 'Jl. Surabaya Malang No 12',
                'phone_number' => '081232152152',
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
