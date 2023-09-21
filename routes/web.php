<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ProfileController;

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
    return view('files.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/files', [FileController::class, 'downloadedFiles'])
        ->name('files.downloadedFiles');
    Route::delete('/files/{id}', [FileController::class, 'destroy'])
        ->name('files.destroy')->where('id', '\d+');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/fileSharing', [FileController::class, 'index'])
    ->name('files.index');

Route::post('/fileSharing', [FileController::class, 'store'])
    ->name('files.store');

Route::get('/success/{id}', [FileController::class, 'show'])
    ->name('files.show');

Route::get('/file/{file}/show', [FileController::class, 'fileInfo'])
    ->name('files.fileInfo');

Route::get('/downloadPage/{id}', [FileController::class, 'downloadPage'])
    ->name('files.downloadPage');

Route::get('/files/{unique_link}', [FileController::class, 'download'])
    ->name('files.download');

require __DIR__ . '/auth.php';
