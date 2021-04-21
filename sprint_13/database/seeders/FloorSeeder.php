<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('floors')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('floors')->insert(['floor' => 1, 'floor_theme' => 'Civilizaciones' ]);
        DB::table('floors')->insert(['floor' => 2, 'floor_theme' => 'Cine' ]);
        DB::table('floors')->insert(['floor' => 3, 'floor_theme' => 'Naturaleza' ]);
    }
}
