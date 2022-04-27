<?php

use Illuminate\Database\Seeder;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('levels')->insert([

            [
            'nama' => 'Super Admin',
            'keterangan' => 'superadmin', 
            ],
             [
            'nama' => 'Admin',
            'keterangan' => 'admin', 
            ],
            [
            'nama' => 'Petugas',
            'keterangan' => 'Room Service', 
            ],
            
           
            
        ]);
    }
}
