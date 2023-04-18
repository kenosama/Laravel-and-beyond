<?php

use App\Http\Controllers\Admin\PictureController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
$idRegex='[0-9]+';
$slugRegex='[0-9A-z\-]+';

Route::get('/', [HomeController::class, 'index']);
Route::get('/Properties', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/Properties/{slug}-{property}', [App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where([
    'slug'=>$slugRegex,
    'property' => $idRegex,
]);
Route::post('/Properties/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex,
]);

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'dologin']);
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function() use ($idRegex){
    Route::resource('property', App\Http\Controllers\Admin\PropertyController::class)->except(['show']);
    Route::resource('option', App\Http\Controllers\Admin\OptionController::class)->except(['show']);
    Route::delete('picture/{picture}', [PictureController::class, 'destroy'])
    ->name('picture.destroy')
    ->where([
        'picture'=>$idRegex
    ]);
});
