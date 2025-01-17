<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
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

    // Crud Bank
    Route::get('/bank', [MasterController::class, 'index_bank'])->name('bank.index');
    Route::get('/bank/tambah', [MasterController::class, 'create_bank'])->name('bank.create');
    Route::post('/bank/save', [MasterController::class, 'save_bank'])->name('bank.save');
    Route::get('/bank/edit/{id}', [MasterController::class, 'edit_bank'])->name('bank.edit');
    Route::put('/bank/update/{id}', [MasterController::class, 'update_bank'])->name('bank.update');
    Route::delete('/bank/delete/{id}', [MasterController::class, 'delete_bank'])->name('bank.delete');

    // Crud Supplier
    Route::get('/supplier', [MasterController::class, 'index_supplier'])->name('supplier.index');
    Route::get('/supplier/tambah', [MasterController::class, 'create_supplier'])->name('supplier.create');
    Route::post('/supplier/save', [MasterController::class, 'save_supplier'])->name('supplier.save');
    Route::get('/supplier/edit/{id}', [MasterController::class, 'edit_supplier'])->name('supplier.edit');
    Route::put('/supplier/update/{id}', [MasterController::class, 'update_supplier'])->name('supplier.update');
    Route::delete('/supplier/delete/{id}', [MasterController::class, 'delete_supplier'])->name('supplier.delete');

    // Crud Rekening
    Route::get('/rekening', [MasterController::class, 'index_rekening'])->name('rekening.index');
    Route::get('/rekening/tambah', [MasterController::class, 'create_rekening'])->name('rekening.create');
    Route::post('/rekening/save', [MasterController::class, 'save_rekening'])->name('rekening.save');
    Route::get('/rekening/edit/{id}', [MasterController::class, 'edit_rekening'])->name('rekening.edit');
    Route::put('/rekening/update/{id}', [MasterController::class, 'update_rekening'])->name('rekening.update');
    Route::delete('/rekening/delete/{id}', [MasterController::class, 'delete_rekening'])->name('rekening.delete');

    //CRUD Pembelian
    Route::get('/pembelian', [MasterController::class, 'pembelian_main'])->name('pembelian.pembelian-index');
    Route::get('/pembelian/create-pembelian', [MasterController::class, 'pembelian_create'])->name('pembelian.create-pembelian');
    Route::post('/pembelian/save', [MasterController::class, 'pembelian_save'])->name('pembelian.save');
    Route::get('/pembelian/edit-pembelian/{id}', [MasterController::class, 'pembelian_edit'])->name('pembelian.edit-pembelian');
    Route::put('/pembelian/update/{id}', [MasterController::class, 'pembelian_update'])->name('pembelian.update');
    Route::delete('/pembelian/delete/{id}', [MasterController::class, 'pembelian_delete'])->name('pembelian.delete');

    // CRUD Proyek
    Route::get('/proyek', [ProyekController::class, 'index_proyek'])->name('proyek.index');
    Route::get('/proyek/tambah', [ProyekController::class, 'tambah_proyek'])->name('proyek.tambah');
    Route::post('/proyek/simpan', [ProyekController::class, 'simpan_proyek'])->name('proyek.simpan');
    Route::get('/proyek/ubah/{id}', [ProyekController::class, 'ubah_proyek'])->name('proyek.ubah');
    Route::post('proyek/ubah/{id}', [ProyekController::class, 'update_proyek'])->name('proyek.update');
    Route::delete('/proyek/hapus/{id}', [ProyekController::class, 'hapus_proyek'])->name('proyek.hapus');
});

require __DIR__ . '/auth.php';
