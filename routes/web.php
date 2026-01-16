<?php

use App\Http\Controllers\Carteira\CarteiraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tutor\TutorController;
use App\Http\Controllers\Pet\PetController;
use App\Http\Controllers\Vacina\VacinaController;
use App\Http\Controllers\Veterinario\VeterinarioController;
use App\Http\Controllers\Vacinacao\VacinacaoController;
use App\Http\Controllers\Dashboard\DashboardController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rotas para Tutores
Route::get('/tutors', [TutorController::class, 'index'])->name('tutors.index');
Route::get('/tutors/create', [TutorController::class, 'create'])->name('tutors.create');
Route::post('/tutors', [TutorController::class, 'store'])->name('tutors.store');

// Rotas para Pets
Route::get('/pets', [PetController::class, 'index'])->name('pets.index');
Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create');
Route::post('/pets', [PetController::class, 'store'])->name('pets.store');


// Rotas para veterinários
Route::get('/veterinarios', [VeterinarioController::class, 'index'])->name('veterinarios.index');
Route::get('/veterinarios/create', [VeterinarioController::class, 'create'])->name('veterinarios.create');
Route::post('/veterinarios', [VeterinarioController::class, 'store'])->name('veterinarios.store');


//Rotas para vacinas
Route::get('/vacinas', [VacinaController::class, 'index'])->name('vacinas.index');
Route::get('/vacinas/create', [VacinaController::class, 'create'])->name('vacinas.create');
Route::post('/vacinas', [VacinaController::class, 'store'])->name('vacinas.store');


// Rotas para vacinações
Route::get('/vacinacoes', [VacinacaoController::class, 'index'])->name('vacinacoes.index');
Route::get('/vacinacoes/create', [VacinacaoController::class, 'create'])->name('vacinacoes.create');
Route::post('/vacinacoes', [VacinacaoController::class, 'store'])->name('vacinacoes.store');


// Rota para o dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//Rota para carteira de vacinação
Route::get('/carteira/{pet}', [CarteiraController::class, 'show'])->name('carteira.show');