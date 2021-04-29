<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('shops')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('shops')->insert(['name' => 'Diamond dreams', 'max_pictures' => 28 ]);
        DB::table('shops')->insert(['name' => "Aphrodita's soul", 'max_pictures' => 17 ]);
        DB::table('shops')->insert(['name' => 'Ocean of luxury', 'max_pictures' => 21 ]);
    }
}
