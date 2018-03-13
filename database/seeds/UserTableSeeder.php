<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name'      =>  'Amit kumar',
            'email'     =>  'amit@gmail.com',
            'password'  =>  bcrypt('password'),
            'verified'  =>  User::VERIFIED_USER,
            'admin'     =>  User::ADMIN_USER,
        ]);
    }
}
