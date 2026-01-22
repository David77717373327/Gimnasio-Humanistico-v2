<?php

use App\Http\Controllers\RutasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Ruta principal
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard (usuarios autenticados)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.index');
    } elseif ($user->role === 'student') {
        return redirect()->route('student.index');
    } elseif ($user->role === 'professor') {
        return redirect()->route('professor.index');
    }

    return redirect()->route('usuario.welcome');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rutas públicas – Usuario
|--------------------------------------------------------------------------
*/
Route::get('/usuario/inicio', [RutasController::class, 'mostrarContenidoUsuario'])
    ->name('usuario.welcome');

Route::get('/video-bienvenida', [RutasController::class, 'mostrarcontenidovideobienvenida'])
    ->name('video-bienvenida');

/*
|--------------------------------------------------------------------------
| Información institucional
|--------------------------------------------------------------------------
*/
Route::get('/Historia', [RutasController::class, 'mostrarcontenidohistoria'])
    ->name('Historia');

Route::get('/mision-vision', [RutasController::class, 'mostrarcontenidomisionyvision'])
    ->name('mision-vision');

Route::get('/filosofia-institucional', [RutasController::class, 'mostrarcontenidofilosofiainstitucional'])->name('filosofia-institucional');

Route::get('/simbolos-institucionales', [RutasController::class, 'mostrarcontenidosimbolosinstitucionales'])
    ->name('simbolos-institucionales');

Route::get('/principos-valores', [RutasController::class, 'mostrarcontenidoprincipiosyvarolres'])
    ->name('principios-valores');

Route::get('/politica-calidad', [RutasController::class, 'mostrarcontenidopoliticadecalidad'])
    ->name('politica-calidad');

/*
|--------------------------------------------------------------------------
| Organización institucional
|--------------------------------------------------------------------------
*/
Route::get('/organigrama', [RutasController::class, 'mostrarcontenidoorganigrama'])
    ->name('organigrama');

Route::get('/Grupo-humanistico', [RutasController::class, 'mostrarcontenidoGrupohumanistico'])
    ->name('Grupo_humanistico');

Route::get('/Gobierno-escolar', [RutasController::class, 'mostrarcontenidoGobiernoescolar'])
    ->name('Gobierno_escolar');

Route::get('/Administrativos', [RutasController::class, 'mostrarcontenidoAdministrativos'])
    ->name('Administrativos');

Route::get('/Docentes', [RutasController::class, 'mostrarcontenidoDocentes'])
    ->name('Docentes');

Route::get('/Directivos', [RutasController::class, 'mostrarcontenidoDirectivos'])
    ->name('Directivos');

/*
|--------------------------------------------------------------------------
| Niveles educativos
|--------------------------------------------------------------------------
*/
Route::get('/Prescolar', [RutasController::class, 'mostrarcontenidoprecolar'])
    ->name('prescolar');

Route::get('/BasicaPrimaria', [RutasController::class, 'mostrarcontenidobasicaprimaria'])
    ->name('basica_primaria');

Route::get('/BasicaSegundaria', [RutasController::class, 'mostrarcontenidobasicasegundaria'])
    ->name('basica_segundaria');

Route::get('/Mediaacademica', [RutasController::class, 'mostrarcontenidomediaacademica'])
    ->name('media_academica');

/*
|--------------------------------------------------------------------------
| Enfoque pedagógico
|--------------------------------------------------------------------------
*/
Route::get('/enfoque-padagogico', [RutasController::class, 'mostrarcontenidoenfoquepadagogico'])
    ->name('enfoque-padagogico');

/*
|--------------------------------------------------------------------------
| Vida estudiantil
|--------------------------------------------------------------------------
*/
Route::get('/tranporte', [RutasController::class, 'mostrarcontenidotranporte'])
    ->name('transporte');

Route::get('/proyectos-institucionales', [RutasController::class, 'mostrarcontenidoproyectosinstitucionales'])
    ->name('proyectos_institucionales');

Route::get('/eventos-celebraciones', [RutasController::class, 'mostrarcontenidoeventoscelebraciones'])
    ->name('eventos_celebraciones');

/*
|--------------------------------------------------------------------------
| Admisiones
|--------------------------------------------------------------------------
*/
Route::get('/admision', [RutasController::class, 'mostrarcontenidoadmision'])
    ->name('admision');
