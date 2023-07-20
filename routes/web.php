<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/wetransfer', [FileController::class, 'index'])
    ->name('files.index');
Route::post('/wetransfer', [FileController::class, 'store'])
    ->name('files.store');
Route::get('/success/{id}', [FileController::class, 'show'])
    ->name('files.show');
Route::get('/downloadPage/{id}', [FileController::class, 'downloadPage'])
    ->name('files.downloadPage');
Route::get('/files/{unique_link}', [FileController::class, 'download'])
    ->name('files.download');

