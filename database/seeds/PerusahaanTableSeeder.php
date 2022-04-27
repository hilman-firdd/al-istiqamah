<?php

use Illuminate\Database\Seeder;

class PerusahaanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('perusahaans')->insert([
            'nama_hotel' => 'Al Istiqomah Hotel',
            'nama_perusahaan' => 'Pesaman Barat',
            'alamat_jalan' => 'Simpang Ampek, Pasaman Barat, Sumatra Barat',
            'alamat_kabupaten' => 'Sumatra Barat',
            'alamat_provinsi' => 'Padang',
            'nomor_telp' => '09876543321',
            'nomor_fax' => '027412345',
            'website' => 'www.istiqomahotel.com',
            'email' => 'alistiqomah@gmail.com',
            
        ]);
    }
}
