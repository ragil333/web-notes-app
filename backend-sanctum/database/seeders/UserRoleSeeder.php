<?php

namespace Database\Seeders;

use App\Models\UserRoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                'kode_role' => '1',
                'nama_role' => 'admin',
            ],
            [
                'kode_role' => '2',
                'nama_role' => 'editor',
            ],
            [
                'kode_role' => '3',
                'nama_role' => 'user',
            ],
        ];

        foreach ($role as $r) {
            UserRoleModel::create($r);
        }
    }
}
