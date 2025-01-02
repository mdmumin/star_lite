<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        $data = [
            [
                'name' => 'Admin',
                'role_serial' => '1',
                'email' => 'admin@gmail.com',
                'phone_number' => '01872871011',
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now()
            ],

            [
                'name' => 'Super Admin',
                'role_serial' => '2',
                'email' => 'superadmin@gmail.com',
                'phone_number' => '01872871023',
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now()

            ],

            [
                'name' => 'User Admin',
                'role_serial' => '3',
                'email' => 'useradmin@gmail.com',
                'phone_number' => '01872875211',
                'password' => Hash::make('123456789'),
                'created_at' => Carbon::now()

            ]
        ];
        foreach ($data as $item) {
            User::create($item);
        }
    }
}
