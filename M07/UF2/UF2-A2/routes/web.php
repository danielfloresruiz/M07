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

Route::get('/form',[ValController::class,'goForm']);
Route::post('/ok',[ValController::class,'testForm'])->name("test");