<?php

namespace Database\Seeders;

use App\Models\Leave;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);

        User::factory(3)
        ->create()
        ->each(function ($user) {
            $user->leaves()->saveMany(Leave::factory(3)->make());
        });
    }
}
