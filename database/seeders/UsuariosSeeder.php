<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
            'usuario_id' => 1,
            'ubicacion_id' => 2,
            'roles_id' => 1,
            'avatar_id' => 6,
            'email' => 'abril@gmail.com',
            'nombre' => 'Abril',
            'apellido' => 'Hernandez',
            'biografia' => '', 
            'password' => Hash::make('hernandez'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'usuario_id' => 2,
            'ubicacion_id' => 10,
            'roles_id' => 1,
            'avatar_id' => 2,
            'email' => 'jorgelina@gmail.com',
            'nombre' => 'Jorgelina',
            'apellido' => 'Pestalardo',
            'biografia' => '', 
            'password' => Hash::make('pestalardo'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'usuario_id' => 3,
            'ubicacion_id' => 6,
            'roles_id' => 3,
            'avatar_id' => 5,
            'email' => 'donante@gmail.com',
            'nombre' => 'Florencia',
            'apellido' => 'Rios',
            'biografia' => '', 
            'password' => Hash::make('123'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'usuario_id' => 4,
            'ubicacion_id' => 6,
            'roles_id' => 2,
            'avatar_id' => 1,
            'email' => 'consumidor@gmail.com',
            'nombre' => 'Juan',
            'apellido' => 'Garcia',
            'biografia' => '', 
            'password' => Hash::make('123'),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
            ]
        ]);
    }
}
