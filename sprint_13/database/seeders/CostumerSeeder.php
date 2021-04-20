<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CostumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('costumers')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('costumers')->insert(['name' => 'Francisco Pinto', 'dni' => '21053804H', 'phone'=> '+34235533879']);
        DB::table('costumers')->insert(['name' => 'Isabel Cañete', 'dni' => '97704166M', 'phone'=> '+34654476128']);
        DB::table('costumers')->insert(['name' => 'Marcelino Carapalo', 'dni' => '90515202J', 'phone'=> '+34779646996']);
        DB::table('costumers')->insert(['name' => 'Felisa Mirlini', 'dni' => '23871440Q', 'phone'=> '+34870051629']);
        DB::table('costumers')->insert(['name' => 'Osvaldo Roca', 'dni' => '39871336P', 'phone'=> '+34559684733']);
        DB::table('costumers')->insert(['name' => 'Elisenda DeLuca', 'dni' => '27958369Y', 'phone'=> '+34410495137']);
    }
}
