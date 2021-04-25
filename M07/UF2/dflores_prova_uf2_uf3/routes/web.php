<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

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

Route::get('edicion', [homeController::class, 'goEdicio'])->middleware(['auth']);
Route::get('okokn', [homeController::class, 'goOkok'])->middleware(['auth']);
Route::post('cangeUser', [homeController::class, 'ChangeUser'])->middleware(['auth']);
Route::post('cangeImgUser', [homeController::class, 'ChangeImgUser'])->middleware(['auth']);