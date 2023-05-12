<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VeterinarioSeeder extends Seeder{
    
    public function run($total = 1){
        
        for ($a=0; $a < $total ; $a++) {

            DB::table('veterinarios')->insert([
                
                'nome' => Str::random(10),
                'crmv' => Str::random(10),
                'especialidade' => Str::random(15)
            ]);
        }
    }
}
