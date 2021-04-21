<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('rooms')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('rooms')->insert([
            'number' => 1, 
            'name' => 'Antigua Roma',
            'floor_id' => 1
            ]);
        DB::table('rooms')->insert([
            'number' => 2, 
            'name' => 'Grecia clásica',
            'floor_id' => 1
            ]);
        DB::table('rooms')->insert([
            'number' => 3, 
            'name' => 'Misterioso Egipto',
            'floor_id' => 1
            ]);
        DB::table('rooms')->insert([
            'number' => 4, 
            'name' => 'China imperial',
            'floor_id' => 1
            ]);
        DB::table('rooms')->insert([
            'number' => 1, 
            'name' => 'Star Wars',
            'floor_id' => 2
            ]);
        DB::table('rooms')->insert([
            'number' => 2, 
            'name' => 'Lord of the rings',
            'floor_id' => 2
            ]);
        DB::table('rooms')->insert([
            'number' => 3, 
            'name' => 'Marvel',
            'floor_id' => 2
            ]);
        DB::table('rooms')->insert([
            'number' => 4, 
            'name' => 'Terror',
            'floor_id' => 2
            ]);
        DB::table('rooms')->insert([
            'number' => 1, 
            'name' => 'Selva amazónica',
            'floor_id' => 3
            ]);
        DB::table('rooms')->insert([
            'number' => 2, 
            'name' => 'Playa caribeña',
            'floor_id' => 3
            ]);
        DB::table('rooms')->insert([
            'number' => 3, 
            'name' => 'Desierto del Gobi',
            'floor_id' => 3
            ]);
        DB::table('rooms')->insert([
            'number' => 4, 
            'name' => 'Antártida',
            'floor_id' => 3
            ]);
    }
}
