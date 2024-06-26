<?php

use App\Http\Controllers\BunbouguController;
use App\Models\Bunbougu;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bunbougus', [BunbouguController::class, 'index'])
->name('bunbougus.index');

Route::get('/bunbougus/create', [BunbouguController::class, 'create'])
->name('bunbougus.create');
Route::post('/bunbougus/store', [BunbouguController::class, 'store'])
->name('bunbougus.store');
