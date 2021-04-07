<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'rule_id' => 1,
            'name' => 'Super Admin',
            'email' => 'super_admin@design-app.com',
            'password' => Hash::make('123456'),
            'phone' => '0112345678',
            'status' => 1
        ]);
    }
}
