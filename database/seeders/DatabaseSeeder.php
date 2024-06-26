<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'tuanta',
            'email' => 'admin@gmail.com',
            'address' => '',
            'about_me' => '',
            'password' => Hash::make('123456'),
            'image' => 'https://colorlib.com/etc/regform/colorlib-regform-7/images/signin-image.jpg',
            'role_user' => 2,
            'phone' => '',
        ]);

        $this->call([
            UserSeeder::class,
        ]);
    }
}
