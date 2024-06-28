<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BunbouguController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/bunbougus', [BunbouguController::class, 'index'])
->name('bunbougus.index');

Route::get('/bunbougus/create', [BunbouguController::class, 'create'])
->name('bunbougus.create')->middleware('auth');
Route::post('/bunbougus/store', [BunbouguController::class, 'store'])
->name('bunbougus.store')->gatherMiddleware('auth');

Route::get('/bunbougus/edit/{bunbougu}', [BunbouguController::class, 'edit'])
->name('bunbougus.edit')->middleware('auth');
Route::put('/bunbougus/edit/{bunbougu}', [BunbouguController::class, 'update'])
->name('bunbougus.update')->middleware('auth');

Route::get('/bunbougus/show/{bunbougu}', [BunbouguController::class, 'show'])
->name('bunbougus.show');

Route::delete('bunbougus/{bunbougu}', [BunbouguController::class, 'destroy'])
->name('bunbougus.destroy')->middleware('auth');

require __DIR__.'/auth.php';
