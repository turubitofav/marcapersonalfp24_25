<?php

namespace Database\Seeders;

use App\Models\Competencia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competencia::insert([
            [
                'nombre' => 'Competencia 1',
                'descripcion' => 'Descripcion de la competencia 1',
                'nivel' => 'Nivel 1',
            ],
            [
                'nombre' => 'Competencia 2',
                'descripcion' => 'Descripcion de la competencia 2',
                'nivel' => 'Nivel 2',
            ],
            [
                'nombre' => 'Competencia 3',
                'descripcion' => 'Descripcion de la competencia 3',
                'nivel' => 'Nivel 3',
            ],
            [
                'nombre' => 'Competencia 4',
                'descripcion' => 'Descripcion de la competencia 4',
                'nivel' => 'Nivel 4',
            ],
            [
                'nombre' => 'Competencia 5',
                'descripcion' => 'Descripcion de la competencia 5',
                'nivel' => 'Nivel 5',
            ],
        ]);
    }
}
