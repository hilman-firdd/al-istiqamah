<?php

use Illuminate\Database\Seeder;

class LantaisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('lantais')->insert([
         

         [

            'nama' => '1st Floor',
            'keterangan' => 'test',
         ],
         [

            'nama' => '2nd Floor',
            'keterangan' => 'test',
         ]
            
           
            
        ]);
    }
}
