<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder{

    public function run($total = 1){
        
        for($a=0; $a<$total; $a++){

            DB::table('clientes')->insert([
                'nome' => Str::random(10),
                'email' => Str::random(50)
            ]);
        }
    }
}
