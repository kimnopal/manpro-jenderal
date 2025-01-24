<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index_supplier() {
        $data_supplier = Supplier::filternama()->paginate(10);

        return \view('supplier.index', [
            'judul_index_supplier' => 'List Data Supplier',
            'data_supplier' => $data_supplier,
        ]);
    }
    
    public function create_supplier() {
        
        return \view('supplier.create', [
            'judul_create_supplier' => 'Tambah Data Supplier'
        ]);
    }

    public function save_supplier(Request $request) : RedirectResponse {
        $validated = $request->validate([
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'kontak_supplier' => 'required',
        ]);
        $supplier = new supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->kontak_supplier = $request->kontak_supplier;
        $supplier->save();

        return Redirect::route('supplier.index');
    }

    public function edit_supplier($id) {
        $supplier = Supplier::find($id);

        return \view('supplier.edit', [
            'judul_edit_supplier' => 'Edit Data Supplier',
            'supplier' => $supplier,
        ]);
    }

    public function update_supplier(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'nama_supplier' => 'required',
            'alamat_supplier' => 'required',
            'kontak_supplier' => 'required',
        ]);
        $supplier = Supplier::find($id);
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->kontak_supplier = $request->kontak_supplier;
        $supplier->save();

        return Redirect::route('supplier.index');
    }

    public function delete_supplier($id) : RedirectResponse {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return Redirect::route('supplier.index');
    }
}
