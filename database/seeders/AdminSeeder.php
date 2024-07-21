<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' =>  'admin@gmail.com'],
            [
                'name' => 'admin',
                'date' => date('Y-m-d H:i:s'),
                'gender' => 1,
                'phone' =>'0283475254',
                'password' => Hash::make('1234568')
            ]
        );
        $user->assignRole(config('auth.role_name.admin'));
    }
}
