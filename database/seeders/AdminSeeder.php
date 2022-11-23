<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'John',
            'email' => 'john@admin.com',
            'phone' => '01234567889',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}