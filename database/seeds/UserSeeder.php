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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@agung.com',
            'password' => bcrypt('12345678'),
        ]);

        $admin->assignRole('admin');

        $kasir = User::create([
            'name' => 'kasir',
            'email' => 'kasir@agung.com',
            'password' => bcrypt('12345678'),
        ]);

        $kasir->assignRole('kasir');

        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@agung.com',
            'password' => bcrypt('12345678'),
        ]);

        $manager->assignRole('manager');
    }
}
