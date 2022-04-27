<?php

use Illuminate\Database\Seeder;

class KamarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \Illuminate\Support\Facades\DB::table('kamars')->insert([
            
            [
               'nomor_kamar' => '101',
               'type_id' => '1',
               'max_dewasa' => '2',
               'max_anak' => '1',
               'status' => '0',
               'lantai_id' => '1', 
            ],
            [
               'nomor_kamar' => '102',
               'type_id' => '1',
               'max_dewasa' => '2',
               'max_anak' => '1',
               'status' => '0',
               'lantai_id' => '1', 
            ],

             [
               'nomor_kamar' => '103',
            'type_id' => '1',
            'max_dewasa' => '2',
            'max_anak' => '1',
            'status' => '0',
            'lantai_id' => '1', 
            ],

             [
               'nomor_kamar' => '104',
            'type_id' => '1',
            'max_dewasa' => '2',
            'max_anak' => '1',
            'status' => '0',
            'lantai_id' => '1', 
            ],

             [
               'nomor_kamar' => '201',
            'type_id' => '2',
            'max_dewasa' => '2',
            'max_anak' => '1',
            'status' => '0',
            'lantai_id' => '2', 
            ],

             [
               'nomor_kamar' => '202',
            'type_id' => '2',
            'max_dewasa' => '2',
            'max_anak' => '1',
            'status' => '0',
            'lantai_id' => '2', 
            ],

             [
               'nomor_kamar' => '203',
            'type_id' => '2',
            'max_dewasa' => '2',
            'max_anak' => '1',
            'status' => '0',
            'lantai_id' => '2', 
            ],

             [
               'nomor_kamar' => '204',
            'type_id' => '2',
            'max_dewasa' => '2',
            'max_anak' => '1',
            'status' => '0',
            'lantai_id' => '2', 
            ],

             [
               'nomor_kamar' => '301',
            'type_id' => '3',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '3', 
            ],

             [
               'nomor_kamar' => '302',
            'type_id' => '3',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '3', 
            ],

             [
               'nomor_kamar' => '303',
            'type_id' => '3',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '3', 
            ],

             [
               'nomor_kamar' => '304',
            'type_id' => '3',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '3', 
            ],

             [
               'nomor_kamar' => '401',
            'type_id' => '4',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '4', 
            ],

             [
               'nomor_kamar' => '402',
            'type_id' => '4',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '4', 
            ],

             [
               'nomor_kamar' => '403',
            'type_id' => '4',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '4', 
            ],

             [
               'nomor_kamar' => '404',
            'type_id' => '4',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '4', 
            ],
             [
               'nomor_kamar' => '501',
            'type_id' => '5',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '5', 
            ],
             [
               'nomor_kamar' => '502',
            'type_id' => '5',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '5', 
            ],
             [
               'nomor_kamar' => '503',
            'type_id' => '5',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '5', 
            ],
             [
               'nomor_kamar' => '504',
            'type_id' => '5',
            'max_dewasa' => '3',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '5', 
            ],
            [
               'nomor_kamar' => '601',
            'type_id' => '6',
            'max_dewasa' => '4',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '6', 
            ],
             [
               'nomor_kamar' => '602',
            'type_id' => '6',
            'max_dewasa' => '4',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '6', 
            ],
             [
               'nomor_kamar' => '603',
            'type_id' => '6',
            'max_dewasa' => '4',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '6', 
            ],
             [
               'nomor_kamar' => '604',
            'type_id' => '6',
            'max_dewasa' => '4',
            'max_anak' => '2',
            'status' => '0',
            'lantai_id' => '6', 
            ]
            
        
            
        ]);
    }
}
