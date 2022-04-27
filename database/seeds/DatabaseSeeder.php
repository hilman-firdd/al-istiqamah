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
      $this->call(LevelTableSeeder::class);
      $this->call(KamarsTableSeeder::class);
      $this->call(KamarsTypeTableSeeder::class);
      $this->call(TamusTableSeeder::class);
      $this->call(LantaisTableSeeder::class);
      $this->call(PerusahaanTableSeeder::class);
    }
}
