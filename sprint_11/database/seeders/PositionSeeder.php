<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('positions')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('positions')->insert(['name' => 'gerente']);
        DB::table('positions')->insert(['name' => 'encargado/a de sección']);
        DB::table('positions')->insert(['name' => 'empleado/a raso/a']);
        DB::table('positions')->insert(['name' => 'becario/a']);
    }

}
