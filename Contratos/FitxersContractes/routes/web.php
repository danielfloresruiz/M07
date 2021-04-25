<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

//Route::get('/dashboard', [HomeController::class, 'GoDashboard'])->middleware(['auth']);

require __DIR__.'/auth.php';


Route::get('contracts', [HomeController::class, 'GoContracts'])->middleware(['auth']);
Route::post('upContract', [HomeController::class, 'GoUpContract'])->middleware(['auth']);

Route::get('addTeacher', [HomeController::class, 'GoAddTeacher'])->middleware(['auth']);
Route::get('addStudent', [HomeController::class, 'GoAddStudent'])->middleware(['auth']);
Route::get('addCompany', [HomeController::class, 'GoAddCompany'])->middleware(['auth']);
Route::post('registerUser', [HomeController::class, 'CreateUser'])->middleware(['auth']);

Route::get('addContract', [HomeController::class, 'GoAddContract'])->middleware(['auth']);
Route::post('createContract', [HomeController::class, 'CreateContract'])->middleware(['auth']);
