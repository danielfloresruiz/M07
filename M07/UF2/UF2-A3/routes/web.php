<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Llibres;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('llistarLlibres', [Llibres::class, 'index'])->name("llistarLlibres")->middleware(['auth']);

Route::get('formAddLlibre', [Llibres::class, 'create'])->middleware(['auth']);
Route::post('storeLlibre', [Llibres::class, 'store'])->middleware(['auth']);
Route::get('deleteLlibre/{id}', [Llibres::class, 'delete'])->middleware(['auth']);
Route::get('editLlibre/{id}', [Llibres::class, 'edit'])->middleware(['auth']);
Route::post('updateLlibre', [Llibres::class, 'update'])->middleware(['auth']);