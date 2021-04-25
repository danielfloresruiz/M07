<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValController;

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

Route::get('goForm', [ValController::class, 'goForm'])->middleware(['auth']);
Route::post('goOk', [ValController::class, 'testForm'])->middleware(['auth']);

Route::get('edicio', [ValController::class, 'editUser'])->middleware(['auth']);
Route::post('cangeUser', [ValController::class, 'ChangeUser'])->middleware(['auth']);


