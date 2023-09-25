<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRoleModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = UserRoleModel::where('kode_role', 1)->pluck('id')->first();
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'id_role' => $role,
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'), // password
        ]);
    }
}
