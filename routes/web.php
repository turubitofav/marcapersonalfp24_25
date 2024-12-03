<?php

use App\Http\Controllers\HomeController;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function() {
    return view('auth.login');
});

Route::get('logout', function() {
    return 'Logout usuario';
});

Route::get('perfil/{id?}', function($id = null) {
    return $id ? 'Visualizar el currículo de '. $id : 'Visualizar el currículo propio';
})->where('id', '[0-9]*');

Route::get('pruebaDB/{id}', function ($id = null) {
        $count = Estudiante::where('votos', '>', 100)->count();
        $max = Estudiante::max('votos');
        $min = Estudiante::min('votos');
        $media = Estudiante::avg('votos');
        $total = Estudiante::sum('votos');
        $salida = '<ul>';
        $salida = '<li>Estudiantes con más de 100 votos: '.$count.'</li>';
        $salida .= '<li>Máximo número de votos: '.$max.'</li>';
        $salida .= '<li>Mínimo número de votos: '.$min.'</li>';
        $salida .= '<li>Media de votos: '.$media.'</li>';
        $salida .= '<li>Total de votos: '.$total.'</li>';
        $salida.'</ul>';
        $estudiantes = Estudiante::where('votos', '>', 100)->take(5)->get();
        foreach ($estudiantes as $est) {
            $salida .='<li>'.$est->nombre.'</li>';
        }
        $count = Estudiante::where('votos', '>', 100)->count();
        $salida .='</ul>';
        $salida .= 'Antes: ' . $count . '<br />';

        //$id = $votos ? $votos : 1;
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->nombre = 'Juan';
        $estudiante->apellidos = 'Martínez';
        $estudiante->direccion = 'Dirección de Juan';
        $estudiante->votos = 130;
        $estudiante->confirmado = true;
        $estudiante->ciclo = 'DAW';
        $estudiante->save();

        $count = Estudiante::where('votos', '>', 100)->count();
        $salida .= 'Después: ' . $count . '<br />';

        return $salida;
    }
);



include __DIR__.'/actividades.php';
include __DIR__.'/curriculos.php';
include __DIR__.'/proyectos.php';
include __DIR__.'/reconocimientos.php';
include __DIR__.'/users.php';
