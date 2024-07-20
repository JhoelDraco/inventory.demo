<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;

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

Route::get('/index', [InventoryController::class, 'index'])->name('index');

Route::controller(InventoryController::class)->group(function(){ 
    Route::get('/','index')->name('inventory.index');
    Route::get('/recommed', 'recommend')->name('inventory.recommend');
});
