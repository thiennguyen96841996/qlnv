<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
    }
}


class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'tien tien',
                'email' => 'thiennguyen96841996@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456789',
                'address' => 'Hưng Yên, Việt Nam',
                'avatar' => 'default-avatar.png',
                'role' => 'employee',
            ], [
                'name' => 'chin chin',
                'email' => 'tinhhang22@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456788',
                'address' => 'Hà Nội, Việt Nam',
                'avatar' => 'default-avatar.png',
                'role' => 'manager',
            ], [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '0123456783',
                'address' => 'Hà Nội, Việt Nam',
                'avatar' => 'default-avatar.png',
                'role' => 'manager',
            ]
        ]);
    }
}
