<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desactiva el proceso de claves foraneas
        DB::table('pictures')->truncate();//vacía la tabla
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//reactiva el proceso
        
        DB::table('pictures')->insert([
            'name' => 'Francis Bacon',
            'name_fake' => 'Collar de diamantes «L’Incomparable»',
            'author' => 'Lucian Freud',
            'price' => 200000.0,
            'price_fake' => 1000.0,
            'description' => 'Retrato que Lucian Freud hizo sobre Francis Bacon.',
            'description_fake' => 'Similar al tamaño de un huevo, con un peso de 407 quilates, suspendido por un marco de oro rosa y decorado con 90 diamantes blancos más pequeños que pesan 230 quilates.',
            'photo' => 'https://img.culturacolectiva.com/content/2016/01/francis-bacon-medium.jpg',
            'photo_fake' => 'https://www.dhresource.com/0x0/f2/albu/g5/M01/EE/6D/rBVaJFkUF7-ASGHXAAZDXCK75jE341.jpg',
            'date_arrival' => '2021-02-16',
            'shop_id' => 1
            ]);
        
         DB::table('pictures')->insert([
            'name' => 'Le Pigeon aux peitis pois',
            'name_fake' => 'Collar Hutton-Mdivani',
            'author' => 'Pablo Picasso',
            'price' => 5000000.0,
            'price_fake' => 5000.0,
            'description' => 'Le pigeon aux petit pois es una obra de Pablo Picasso pintada en 1911. Tiene un estilo cubista y representa varias figuras geométricas en tonos grises y blancos sobre un fondo de color ocre.',
            'description_fake' => 'Collar de jadeíta Hatton-Mdivani, que recibe su nombre por sus dueñas, Barbara Hutton y Nina Mdivani.',
            'photo' => 'https://img.culturacolectiva.com/content/2016/01/Le-Pigeon-aux-peitis-pois-medium.jpg',
            'photo_fake' => 'https://www.dhresource.com/f2/albu/g9/M01/B2/B9/rBVaVVxFqiSAYixWAAfAA0K6CTs891.jpg',
            'date_arrival' => '2017-10-23',
            'shop_id' => 2
            ]);
        
         DB::table('pictures')->insert([
            'name' => 'Retrato de un hombre joven',
            'name_fake' => 'Bikini de Diamantes',
            'author' => 'Rafael',
            'price' => 12000000.0,
            'price_fake' => 1200.0,
            'description' => 'Se desconoce quién es, pero se especula que sea un autorretrato, sobre todo por el autorretrato detectado por Giorgio Vasari en "La escuela de Atenas"',
            'description_fake' => 'Diseñado especialmente para la revista Sports Illustrated, lo lució en portada la actriz estadounidense Molly Sims (Las Vegas) en febrero del 2006.',
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/9/95/Raphael_missing.jpg',
            'photo_fake' => 'https://www.dhresource.com/0x0/f2/albu/g6/M00/44/F9/rBVaR1r7H-SAbwfcAAMwvpMfpSI012.jpg/wholesale-brand-indian-jewelry-handmade-beaded.jpg',
            'date_arrival' => '2021-04-02',
            'shop_id' => 3
            ]);
        
         DB::table('pictures')->insert([
            'name' => 'Natividad con San Francisco y San Lorenzo',
            'name_fake' => 'Collar de diamantes de Christie',
            'author' => 'Caravaggio',//Michelangelo Merisi da Caravaggio
            'price' => 22000000.0,
            'price_fake' => 2200.0,
            'description' => 'El cuadro, típico del arte tenebrista del autor, muestra a los santos Francisco de Asís y Lorenzo junt a la Sagrada Familia.',
            'description_fake' => 'Se realza con 52 diamantes redondeados que tiene el peso total de 104.84 quilates que es absolutamente una pieza elegante y hermosa.',
            'photo' => 'https://img.culturacolectiva.com/content/2016/01/Natividad-con-San-Francisco-y-San-Lorenzo-medium.jpg',
            'photo_fake' => 'https://ae01.alicdn.com/kf/HTB1FRZwIFXXXXclXFXXq6xXFXXXi/UKMOC-Collar-con-cuentas-de-moda-para-mujer-nuevos-accesorios-de-boda-liberando-collares-de-perlas.jpg_960x960.jpg',
            'date_arrival' => '2021-04-01',
            'shop_id' => 1
            ]);
        
         DB::table('pictures')->insert([
            'name' => 'Congregación saliendo de la iglesia reformada en Nuenen',
            'name_fake' => 'Leviev’s Vivid Colgante Diamante Amarillo',
            'author' => 'Vincent van Gogh',
            'price' => 18000000.0,
            'price_fake' => 1800.0,
            'description' => 'Pintura temprana de Vincent van Gogh, hecha a principios de 1884 y modificada a finales de 1885.',
            'description_fake' => 'Es collar muy hermoso que tiene el peso total de 77.12 quilates de diamantes amarillos, y la secuencia se hace de diamantes blancos.',
            'photo' => 'https://img.culturacolectiva.com/content/2016/01/Congregacion-saliendo-de-la-iglesia-reformada-en-Nuenen-medium.jpg',
            'photo_fake' => 'https://ae01.alicdn.com/kf/HTB1OZ.3PVXXXXbIXVXXq6xXFXXXt/Gargantillas-de-cristal-de-lujo-para-mujer-gargantilla-de-diamantes-de-imitaci-n-borla-collar-con.jpg',
            'date_arrival' => '2021-04-01',
            'shop_id' => 2
            ]);
        
         DB::table('pictures')->insert([
            'name' => 'Chez Tortoni',
            'name_fake' => 'El Corazón del Reino',
            'author' => 'Édouard Manet',
            'price' => 18000000.0,
            'price_fake' => 1800.0,
            'description' => 'Chez Tortoni es una pintura del artista francés Édouard Manet, pintado ca. 1875. El óleo sobre lienzo mide 26 por 34 centímetros.',
            'description_fake' => 'Está hecho de 150 diamantes de especies raras y caras también. Es el collar que usualmente es usado por diferentes reinas del mundo.',
            'photo' => 'https://img.culturacolectiva.com/content/2016/01/Chez-Tortoni-medium.jpg',
            'photo_fake' => 'https://www.dhresource.com/0x0/f2/albu/g7/M00/DF/C7/rBVaSluhx-SAZFTIAANaTpaiTLo073.jpg/2017-new-fashion-xg233-luxury-necklaces-pendants.jpg',
            'date_arrival' => '2021-04-01',
            'shop_id' => 3
            ]);
    }
}
