<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\SupplierController;
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
    Route::get('/client', [ClientController::class, 'index_client'])->name('client.index');
    Route::get('/client/tambah', [ClientController::class, 'create_client'])->name('client.create');
    Route::post('/client/save', [ClientController::class, 'save_client'])->name('client.save');
    Route::get('/client/edit/{id}', [ClientController::class, 'edit_client'])->name('client.edit');
    Route::put('/client/update/{id}', [ClientController::class, 'update_client'])->name('client.update');
    Route::delete('/client/delete/{id}', [ClientController::class, 'delete_client'])->name('client.delete');

    // Crud Item
    Route::get('/item', [ItemController::class, 'index_item'])->name('item.index');
    Route::get('/item/tambah', [ItemController::class, 'create_item'])->name('item.create');
    Route::post('/item/save', [ItemController::class, 'save_item'])->name('item.save');
    Route::get('/item/edit/{id}', [ItemController::class, 'edit_item'])->name('item.edit');
    Route::put('/item/update/{id}', [ItemController::class, 'update_item'])->name('item.update');
    Route::delete('/item/delete/{id}', [ItemController::class, 'delete_item'])->name('item.delete');

    // Crud Satuan
    Route::get('/satuan', [SatuanController::class, 'index_satuan'])->name('satuan.index');
    Route::get('/satuan/tambah', [SatuanController::class, 'create_satuan'])->name('satuan.create');
    Route::post('/satuan/save', [SatuanController::class, 'save_satuan'])->name('satuan.save');
    Route::get('/satuan/edit/{id}', [SatuanController::class, 'edit_satuan'])->name('satuan.edit');
    Route::put('/satuan/update/{id}', [SatuanController::class, 'update_satuan'])->name('satuan.update');
    Route::delete('/satuan/delete/{id}', [SatuanController::class, 'delete_satuan'])->name('satuan.delete');

    // Crud Bank
    Route::get('/bank', [BankController::class, 'index_bank'])->name('bank.index');
    Route::get('/bank/tambah', [BankController::class, 'create_bank'])->name('bank.create');
    Route::post('/bank/save', [BankController::class, 'save_bank'])->name('bank.save');
    Route::get('/bank/edit/{id}', [BankController::class, 'edit_bank'])->name('bank.edit');
    Route::put('/bank/update/{id}', [BankController::class, 'update_bank'])->name('bank.update');
    Route::delete('/bank/delete/{id}', [BankController::class, 'delete_bank'])->name('bank.delete');

    // Crud Supplier
    Route::get('/supplier', [SupplierController::class, 'index_supplier'])->name('supplier.index');
    Route::get('/supplier/tambah', [SupplierController::class, 'create_supplier'])->name('supplier.create');
    Route::post('/supplier/save', [SupplierController::class, 'save_supplier'])->name('supplier.save');
    Route::get('/supplier/edit/{id}', [SupplierController::class, 'edit_supplier'])->name('supplier.edit');
    Route::put('/supplier/update/{id}', [SupplierController::class, 'update_supplier'])->name('supplier.update');
    Route::delete('/supplier/delete/{id}', [SupplierController::class, 'delete_supplier'])->name('supplier.delete');

    // Crud Rekening
    Route::get('/rekening', [RekeningController::class, 'index_rekening'])->name('rekening.index');
    Route::get('/rekening/tambah', [RekeningController::class, 'create_rekening'])->name('rekening.create');
    Route::post('/rekening/save', [RekeningController::class, 'save_rekening'])->name('rekening.save');
    Route::get('/rekening/edit/{id}', [RekeningController::class, 'edit_rekening'])->name('rekening.edit');
    Route::put('/rekening/update/{id}', [RekeningController::class, 'update_rekening'])->name('rekening.update');
    Route::delete('/rekening/delete/{id}', [RekeningController::class, 'delete_rekening'])->name('rekening.delete');

    //CRUD Pembelian
    Route::get('/pembelian', [PembelianController::class, 'pembelian_main'])->name('pembelian.pembelian-index');
    Route::get('/pembelian/create-pembelian', [PembelianController::class, 'pembelian_create'])->name('pembelian.create-pembelian');
    Route::post('/pembelian/save', [PembelianController::class, 'pembelian_save'])->name('pembelian.save');
    Route::get('/pembelian/edit-pembelian/{id}', [PembelianController::class, 'pembelian_edit'])->name('pembelian.edit-pembelian');
    Route::put('/pembelian/update/{id}', [PembelianController::class, 'pembelian_update'])->name('pembelian.update');
    Route::delete('/pembelian/delete/{id}', [PembelianController::class, 'pembelian_delete'])->name('pembelian.delete');

    // CRUD Proyek
    Route::get('/proyek', [ProyekController::class, 'index_proyek'])->name('proyek.index');
    Route::get('/proyek/tambah', [ProyekController::class, 'tambah_proyek'])->name('proyek.tambah');
    Route::post('/proyek/simpan', [ProyekController::class, 'simpan_proyek'])->name('proyek.simpan');
    Route::get('/proyek/ubah/{id}', [ProyekController::class, 'ubah_proyek'])->name('proyek.ubah');
    Route::post('proyek/ubah/{id}', [ProyekController::class, 'update_proyek'])->name('proyek.update');
    Route::delete('/proyek/hapus/{id}', [ProyekController::class, 'hapus_proyek'])->name('proyek.hapus');
});

require __DIR__ . '/auth.php';
