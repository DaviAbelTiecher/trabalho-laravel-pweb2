<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ModalidadeController;
use App\Http\Controllers\AvaliacaoFisicaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home');
});

// Autenticação / Session
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// CRUD Alunos
Route::get('/aluno', [AlunoController::class, 'index']);
Route::get('/aluno/create', [AlunoController::class, 'create']);
Route::post('/aluno/store', [AlunoController::class, 'store'])->name('aluno.store');
Route::get('/aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
Route::put('/aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])->name('aluno.destroy');
Route::post('/aluno/search', [AlunoController::class, 'search'])->name('aluno.search');

// CRUD Modalidades
Route::get('/modalidade', [ModalidadeController::class, 'index']);
Route::get('/modalidade/create', [ModalidadeController::class, 'create']);
Route::post('/modalidade/store', [ModalidadeController::class, 'store'])->name('modalidade.store');
Route::get('/modalidade/edit/{id}', [ModalidadeController::class, 'edit'])->name('modalidade.edit');
Route::put('/modalidade/update/{id}', [ModalidadeController::class, 'update'])->name('modalidade.update');
Route::delete('/modalidade/{id}', [ModalidadeController::class, 'destroy'])->name('modalidade.destroy');
Route::post('/modalidade/search', [ModalidadeController::class, 'search'])->name('modalidade.search');

// CRUD Avaliações Físicas
Route::get('/avaliacao-fisica', [AvaliacaoFisicaController::class, 'index']);
Route::get('/avaliacao-fisica/create', [AvaliacaoFisicaController::class, 'create']);
Route::post('/avaliacao-fisica/store', [AvaliacaoFisicaController::class, 'store'])->name('avaliacao-fisica.store');
Route::get('/avaliacao-fisica/edit/{id}', [AvaliacaoFisicaController::class, 'edit'])->name('avaliacao-fisica.edit');
Route::put('/avaliacao-fisica/update/{id}', [AvaliacaoFisicaController::class, 'update'])->name('avaliacao-fisica.update');
Route::delete('/avaliacao-fisica/{id}', [AvaliacaoFisicaController::class, 'destroy'])->name('avaliacao-fisica.destroy');
Route::post('/avaliacao-fisica/search', [AvaliacaoFisicaController::class, 'search'])->name('avaliacao-fisica.search');
