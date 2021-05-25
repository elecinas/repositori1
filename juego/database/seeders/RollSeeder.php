<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); //desactiva el proceso de claves foraneas
        DB::table('rolls')->truncate(); //vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); //reactiva el proceso

        DB::table('rolls')->insert([
            'result_dice_1' => 1,
            'result_dice_2' => 6,
            'user_id' => 1
        ]);

        DB::table('rolls')->insert([
            'result_dice_1' => 3,
            'result_dice_2' => 5,
            'user_id' => 1
        ]);
    }
}
