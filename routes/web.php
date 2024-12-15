<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\SimpleMiddleware;
use App\Http\Middleware\CountryMiddleware;
use App\Http\Middleware\CreditMiddleware;

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

require __DIR__.'/auth.php';

Route::get('/public', [HomeController::class, 'publicMessage'])->middleware(CreditMiddleware::class);
// Route::get('/private', [HomeController::class, 'privateMessage'])->middleware(['auth']);
// Route::get('/secret', [HomeController::class, 'secretMessage'])->middleware('auth');

// Route::middleware('auth')->group(function(){
//     Route::get('/private', [HomeController::class, 'privateMessage']);
//     Route::get('/secret', [HomeController::class, 'secretMessage']);
// });

Route::middleware(['auth', 'throttle:2,1'])->group(function(){
    Route::get('/private', [HomeController::class, 'privateMessage']);
    Route::get('/secret', [HomeController::class, 'secretMessage']);
});

Route::get('/download', [HomeController::class, 'downloadFile'])->middleware('throttle:2,1');
Route::get('/message', [HomeController::class, 'message'])->middleware(SimpleMiddleware::class);


Route::get('/bd', [HomeController::class, 'contentForBD'])->middleware(CountryMiddleware::class);
