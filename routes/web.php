<?php

use App\Http\Controllers\AudioController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [AudioController::class, 'currentUserEncrypt'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/encrypt', function () {
    return view('encrypt');
})->middleware(['auth', 'verified'])->name('encrypt');
Route::get('/decrypt', function () {
    return view('decrypt');
})->middleware(['auth', 'verified'])->name('decrypt');

Route::post('/encrypt-audio', [AudioController::class, 'encrypt'])->name('encrypt.audio');
Route::get('/encrypted/{id}', [AudioController::class, 'showEncrypted'])->name('encrypted');
Route::post('/decrypt', [AudioController::class, 'decrypt'])->name('decrypt');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
