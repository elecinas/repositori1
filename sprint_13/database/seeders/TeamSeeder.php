<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('teams')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('teams')->insert(['name' => 'FC Barcelona', 'foundation_year' => 1899, 'stadium_id'=> 1]);
        DB::table('teams')->insert(['name' => 'Real Madrid', 'foundation_year' => 1902, 'stadium_id'=> 2]);
        DB::table('teams')->insert(['name' => 'Atlético de Madrid', 'foundation_year' => 1903, 'stadium_id'=> 3]);
        DB::table('teams')->insert(['name' => 'Athletic Club de Bilbao', 'foundation_year' => 1898, 'stadium_id'=> 5]);
        DB::table('teams')->insert(['name' => 'Valencia CF', 'foundation_year' => 1919, 'stadium_id'=> 6]);
        DB::table('teams')->insert(['name' => 'Sevilla FC', 'foundation_year' => 1890, 'stadium_id'=> 7]);
        DB::table('teams')->insert(['name' => 'RCD Espanyol', 'foundation_year' => 1900, 'stadium_id'=> 8]);
        
    }

}
