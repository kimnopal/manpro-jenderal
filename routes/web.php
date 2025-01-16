<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    

    // Modul Master 
    // Crud Client
    Route::get('/client', [MasterController::class, 'index_client'])->name('client.index');
    Route::get('/client/tambah', [MasterController::class, 'create_client'])->name('client.create');
    Route::post('/client/save', [MasterController::class, 'save_client'])->name('client.save');
    Route::get('/client/edit/{id}', [MasterController::class, 'edit_client'])->name('client.edit');
    Route::put('/client/update/{id}', [MasterController::class, 'update_client'])->name('client.update');
    Route::delete('/client/delete/{id}', [MasterController::class, 'delete_client'])->name('client.delete');

    // Crud Item
    Route::get('/item', [MasterController::class, 'index_item'])->name('item.index');
    Route::get('/item/tambah', [MasterController::class, 'create_item'])->name('item.create');
    Route::post('/item/save', [MasterController::class, 'save_item'])->name('item.save');
    Route::get('/item/edit/{id}', [MasterController::class, 'edit_item'])->name('item.edit');
    Route::put('/item/update/{id}', [MasterController::class, 'update_item'])->name('item.update');
    Route::delete('/item/delete/{id}', [MasterController::class, 'delete_item'])->name('item.delete');

    // Crud Satuan
    Route::get('/satuan', [MasterController::class, 'index_satuan'])->name('satuan.index');
    Route::get('/satuan/tambah', [MasterController::class, 'create_satuan'])->name('satuan.create');
    Route::post('/satuan/save', [MasterController::class, 'save_satuan'])->name('satuan.save');
    Route::get('/satuan/edit/{id}', [MasterController::class, 'edit_satuan'])->name('satuan.edit');
    Route::put('/satuan/update/{id}', [MasterController::class, 'update_satuan'])->name('satuan.update');
    Route::delete('/satuan/delete/{id}', [MasterController::class, 'delete_satuan'])->name('satuan.delete');
});

require __DIR__ . '/auth.php';
