<?php

namespace Database\Seeders;

use App\Models\Backend\Admin\UserManagement\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Foreach_;

class UserRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $data = [
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
        ];

        foreach ($data as $item) {
            UserRole::create($item);
        }
    }
}
