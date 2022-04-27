<?php

use Illuminate\Database\Seeder;

class TamusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('tamus')->insert([
            'title' => 'Tn',
            'nama' => 'Muhammad Iradat',
            'tipe_identitas' => 'ktp',
            'nomor_identitas' => '123456',
            'warga_negara' => 'indonesia',
            'alamat_jalan' => 'makassar',
            'alamat_kabupaten' => 'gowa',
            'alamat_provinsi' => 'sulsel',
            'nomor_telp' => '12345678',
            'email' => 'ipip@gmail.com',
            
        ]);
    }
}
