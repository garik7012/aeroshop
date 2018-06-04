<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = env('ADMIN_EMAIL') ?: 'admin@test.com';
        $pwd = env('ADMIN_PWD') ?: 'secret';
        User::firstOrCreate(
            ['email' => $email],
            [
            'name' => 'admin',
            'is_admin' => 1,
            'password' => bcrypt($pwd)
            ]
        );
    }
}
