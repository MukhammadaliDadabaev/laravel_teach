<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::create([
            'name' => 'Aliy',
            'email' => 'aliy@example.com',
            'password' => Hash::make('aliy'),
        ]);
        $user->roles()->attach([1, 3]);

        $user2 = User::create([
            'name' => 'Ganiy',
            'email' => 'ganiy@example.com',
            'password' => Hash::make('ganiy'),
        ]);
        $user2->roles()->attach([2]);
        // \App\Models\User::factory(10)->create();
    }
}
