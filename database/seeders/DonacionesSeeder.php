<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        DB::table('donaciones')->insert([
            [
                // El id es auto-incremental, por lo que no es estrictamente necesario setearlo (podría
                // dejarlo en null). Pero yo lo suelo poner por temas de testing.
                'donacion_id' => 1,
                'usuario_id' => 3,
                'tipo_id' => '1',
                'ubicacion_id' => 6,
                'titulo' => 'Maderas de Palet',
                'img' => '20230608013757_maderas-de-palet.jpg',
                'estado' => 'usado',
                'descripcion' => '6 Palets, rústicos jamas pintados, no estan mojados, se encuentran en buen estado',
                'fecha' => '2023-11-20',
                // now() es una función "helper" del Laravel que retorna la fecha y hora actual.
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'donacion_id' => 2,
                'usuario_id' => 3,
                'tipo' => '6',
                'ubicacion_id' => 6,
                'titulo' => "Botellas de Vidrio",
                'img' => '20230608013958_botellas-de-vidrio.jpg',
                'estado' => 'casi-nuevo',
                'descripcion' => 'Tengo 35 Botellas de vidrio de salsa de tomate, sin rajaduras ni golpes, quién este interesado que no dude en escribirme',
                'fecha' => '2023-11-20',
                // now() es una función "helper" del Laravel que retorna la fecha y hora actual.
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'donacion_id' => 3,
                'usuario_id' => 1,
                'tipo' => '4',
                'ubicacion_id' => 6,
                'titulo' => "Ovillos de lana",
                'img' => 'ovillos-lana.jpg',
                'estado' => 'nuevo',
                'descripcion' => 'Hola como están? tengo una caja llena de lanas, la mayoria nuevas de distintos colores, interesados pasan a buscar por mi casa.',
                'fecha' => '2023-11-20',
                // now() es una función "helper" del Laravel que retorna la fecha y hora actual.
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'donacion_id' => 4,
                'usuario_id' => 2,
                'tipo' => '7',
                'ubicacion_id' => 2,
                'titulo' => "Cartones de Huevo",
                'img' => 'cartones-huevo.jpg',
                'estado' => 'usado',
                'descripcion' => 'Tengo 38 cartones de huevo en mi casa, pueda servir para compost, me estoy por mudar, escribirme quien este verdaderamente interesado, gracias!',
                'fecha' => '2023-11-20',
                // now() es una función "helper" del Laravel que retorna la fecha y hora actual.
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
