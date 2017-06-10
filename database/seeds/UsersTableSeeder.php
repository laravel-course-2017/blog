<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = 'Admin';
        $adminPassword = '123456';

        User::create([
            'name' => 'Administrator',
            'email' => $adminUser,
            'password' => bcrypt($adminPassword)
        ]);
    }
}
