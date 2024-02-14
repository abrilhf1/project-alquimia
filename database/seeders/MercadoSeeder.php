<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MercadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mercado')->insert([
            [
                'mercado_id' => 1,
                'ubicacion_id' => 2,
                'usuario_id' => 4,
                'titulo' => 'Placard de pino',
                'foto' => 'placard-pino.jpg',
                'caracteristica' => 'Está como nuevo. Tiene unos 1.20 x 1.70. Te lo puedo acercar hasta tu casa',
                'precio' => 15000,
                'autor' => 'Abril',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mercado_id' => 2,
                'ubicacion_id' => 2,
                'usuario_id' => 2,
                'titulo' => 'Juego de sillas de comedor',
                'foto' => 'juego-sillas.jpg',
                'caracteristica' => 'Juegos de comedor. Son de madera pino laqueada y tapizados chenille. Acepto Mercado Pago',
                'precio' => 20000,
                'autor' => 'Jorgelina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mercado_id' => 3,
                'ubicacion_id' => 6,
                'usuario_id' => 3,
                'titulo' => 'Cómoda Kendall',
                'foto' => 'comoda.jpg',
                'caracteristica' => 'Tiene una medida de 140 cm de ancho x 40 cm de profundidad x 80 cm de alto. Se puede abonar al recibir ',
                'precio' => 26000,
                'autor' => 'Florencia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mercado_id' => 4,
                'ubicacion_id' => 6,
                'usuario_id' => 3,
                'titulo' => 'Sillón en perfecto estado',
                'foto' => 'sillon-marron.jpg',
                'caracteristica' => 'Por mudanza vendemos este sillón a un muy buen precio. Está usado pero en un muy estado y sin rotura. Podemos coordinar la entrega',
                'precio' => 30000,
                'autor' => 'Florencia',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}