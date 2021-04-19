<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StadiumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('stadiums')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('stadiums')->insert(['name' => 'Camp Nou']);//FC Barcelona
        DB::table('stadiums')->insert(['name' => 'Santiago Bernabéu']);//Real Madrid
        DB::table('stadiums')->insert(['name' => 'Metropolitano']);//Atlético de Madrid
        DB::table('stadiums')->insert(['name' => 'Estadio Olímpico de la Cartuja']);//sin equipo
        DB::table('stadiums')->insert(['name' => 'San Mamés']);//Athletic Club de Bilbao
        DB::table('stadiums')->insert(['name' => 'Mestalla']);//Valencia CF
        DB::table('stadiums')->insert(['name' => 'Ramón Sánchez Pizjuán']);//Sevilla FC
        DB::table('stadiums')->insert(['name' => 'RCDE Stadium']);//RCD Espanyol
    }
}
