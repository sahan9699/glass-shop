<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QRCodeController;

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

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     $results = [];
//     return view('dashboard', compact('results'));
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'show'])->name('user.show');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('user.edit');
});


// routes/web.php

// Route::post('/store',[LocationController::class, 'store'])->name('store');


Route::get('/generate-qr-code/{id}', [QRCodeController::class, 'generateQRCode'])->name('generate.qr_code');


require __DIR__.'/auth.php';
