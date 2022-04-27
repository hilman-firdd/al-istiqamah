<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('users')->insert([


            [
                        'name' => 'Ipi',
                        'username' => 'Super Admin',
                        'jabatan' => 'superadmin',
                        'email' => 'superadmin@gmail.com',
                        'password' => bcrypt('password'),
                        'level' => '1',
                        'active' => '1',
                        'created_at' => date('Y-m-d')
           ],

             [
                        'name' => 'Admin',
                        'username' => 'Admin',
                        'jabatan' => 'Admin',
                        'email' => 'admin@gmail.com',
                        'password' => bcrypt('password'),
                        'level' => '2',
                        'active' => '1',
                        'created_at' => date('Y-m-d')
           ],
           [
                'name' => 'Amelia',
                        'username' => 'room',
                        'jabatan' => 'room service',
                        'email' => 'room@gmail.com',
                        'password' => bcrypt('password'),
                        'level' => '3',
                        'active' => '1',
                        'created_at' => date('Y-m-d')
           ],

            
        ]);
    }
}
