<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedemittelController;
use App\Http\Controllers\GramatikController;
use App\Http\Controllers\VocabController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/vocab', VocabController::class)->name('index', 'vocab.index');
    Route::post('/multiple-vocab', [VocabController::class, 'multiple'])->name('vocab.multiple');
    Route::resource('/redemittel', RedemittelController::class)->name('index', 'redemittel.index');
    Route::resource('/gramatik', GramatikController::class)->name('index', 'gramatik.index');
    Route::get('/gramatik/preview/{id}', [GramatikController::class, 'preview'])->name('gramatik.preview');
    Route::post('/gramatik/practice', [GramatikController::class, 'practice'])->name('gramatik.practice');


    Route::get('/ai', function () {
        return view('ai');
    })->name('ai');

    Route::post('/extract-pdf', [VocabController::class, 'extract']);
    Route::post('/get-data-ai', [VocabController::class, 'dataAi']);

    Route::get('/game', [GameController::class, 'index'])->name('game.index');
    Route::get('/game/vocab/index', [GameController::class, 'vocabIndex'])->name('game.vocab.index');
    Route::get('/game/vocab/play', [GameController::class, 'vocabPlay'])->name('game.vocab.play');
    Route::post('/vocab/favorite', [GameController::class, 'toggleFavorite']);
    Route::post('/updateVocab',  [GameController::class, 'updateVocab']);

    Route::get('/game/redemittel/index', [GameController::class, 'redemittelIndex'])->name('game.redemittel.index');
    Route::get('/game/redemittel/play', [GameController::class, 'redemittelPlay'])->name('game.redemittel.play');
    Route::post('/redemittel/favorite', [GameController::class, 'toggleFavorite']);

    Route::get('/game/gramatik/index', [GameController::class, 'gramatikIndex'])->name('game.gramatik.index');
    Route::get('/game/gramatik/play', [GameController::class, 'gramatikPlay'])->name('game.gramatik.play');
    Route::post('/gramatik/favorite', [GameController::class, 'toggleFavorite']);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/{pathMatch}', function () {
    return view('app');
})->where('pathMatch', ".*");
