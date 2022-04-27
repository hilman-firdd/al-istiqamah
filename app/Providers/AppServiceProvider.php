<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
          $perusahaan = config('settings.perusahaan');
        $check_table = Schema::hasTable('perusahaan');
        if($check_table){
            $set = $perusahaan::find(1);
            if($set){
                config(['settings.nama_hotel' => $set->nama_hotel,
                        'settings.nama_perusahaan' => $set->nama_perusahaan,
                        'settings.alamat_jalan' => $set->alamat_jalan,
                        'settings.alamat_kabupaten' => $set->alamat_kabupaten,
                        'settings.alamat_provinsi' => $set->alamat_provinsi,
                        'settings.nomor_telp' => $set->nomor_telp,
                        'settings.nomor_fax' => $set->nomor_fax,
                        'settings.website' => $set->website,
                        'settings.email' => $set->email]);
            }
        }
    }
}
