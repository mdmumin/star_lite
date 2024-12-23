<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('user_roles')->insert([
        [
            'title' => 'Super Admin',
            'role_serial' => '1',
            'created_at' => Carbon::now()
        ],
        [
            'title' => 'Admin',
            'role_serial' => '1',
            'created_at' => Carbon::now()
        ],
        [
            'title' => 'Modarator',
            'role_serial' => '1',
            'created_at' => Carbon::now()
        ]
        ]);
    }
}
