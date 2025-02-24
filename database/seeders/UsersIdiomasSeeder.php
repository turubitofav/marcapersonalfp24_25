<?php

namespace Database\Seeders;

use App\Models\Idiomas;
use App\Models\User;
use App\Models\UsersIdiomas;
use Illuminate\Database\Seeder;

class UsersIdiomasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersIdiomas::truncate();

        $users = User::all();
        $idiomas = Idiomas::all();
        $niveles = ["Básico", "Intermedio", "Avanzado"];

        foreach ($users as $user) {

            $numIdiomas = rand(1, $idiomas->count());

            $idiomasAsignados = [];

            for ($i = 0; $i < $numIdiomas; $i++) {

                do {
                    $idiomaIdSeleccionado = $idiomas[rand(0, $idiomas->count() - 1)]->id;
                } while (in_array($idiomaIdSeleccionado, $idiomasAsignados));

                $idioma = new UsersIdiomas();
                $this->command->info('Procesando usuario ID: ' . $user->id);
                $idioma->user_id = $user->id;
                $idioma->idioma_id = $idiomaIdSeleccionado;
                $idioma->nivel = $niveles[rand(0, 2)];
                $idioma->certificado = rand(0, 1);
                $idioma->save();

                $idiomasAsignados[] = $idiomaIdSeleccionado;
            }

        }
    }
}
