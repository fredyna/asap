<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('role', 'admin')->count() == 0) {
            User::create([
                'name'  => 'Admin',
                'email' => 'admin@gmail.com',
                'role'  => 'admin',
                'password'  => bcrypt('12345678'),
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
