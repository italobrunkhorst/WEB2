<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        
        $this->call(EspecialidadeSeeder::class, false, ['total' => 5]);
        $this->call(ClienteSeeder::class, false, ['total' => 5]);
        $this->call(VeterinarioSeeder::class, false, ['total' => 5]);
    }
}
