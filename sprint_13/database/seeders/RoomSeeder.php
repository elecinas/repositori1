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
        
        DB::table('rooms')->insert(['number' => 1, 'floor' => 1]);
        DB::table('rooms')->insert(['number' => 2, 'floor' => 1]);
        DB::table('rooms')->insert(['number' => 3, 'floor' => 1]);
        DB::table('rooms')->insert(['number' => 4, 'floor' => 1]);
        DB::table('rooms')->insert(['number' => 1, 'floor' => 2]);
        DB::table('rooms')->insert(['number' => 2, 'floor' => 2]);
        DB::table('rooms')->insert(['number' => 3, 'floor' => 2]);
        DB::table('rooms')->insert(['number' => 4, 'floor' => 2]);
    }
}
