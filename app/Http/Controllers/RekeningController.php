<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Rekening;
use App\Models\Supplier;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function index_rekening() {
        $data_rekening = Rekening::with(['supplier', 'bank'])->filterSupplier()->paginate(10);

        return \view('rekening.index', [
            'judul_index_rekening' => 'List Data Rekening',
            'data_rekening' => $data_rekening,
        ]);
    }

    public function create_rekening() {
        $data_supplier = Supplier::all();
        $data_bank = Bank::all();

        return \view('rekening.create', [
            'judul_create_rekening' => 'Tambah Data Rekening',
            'data_supplier' => $data_supplier,
            'data_bank' => $data_bank,
        ]);
    }

    public function save_rekening(Request $request) : RedirectResponse {
        $validated = $request->validate([
            'nomor_rekening' => 'required',
            'supplier_id' => 'required|exists:supplier,id',
            'bank_id' => 'required|exists:bank,id',
        ]);
        $rekening = new Rekening();
        $rekening->supplier_id = $request->supplier_id;
        $rekening->bank_id = $request->bank_id;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->save();

        return Redirect::route('rekening.index')
                        ->with('flash_message', 'Rekening Berhasil Dibuat')
                        ->with('flash_type', 'save');
    }

    public function edit_rekening($id) {
        $data_supplier = Supplier::all();
        $data_bank = Bank::all();
        $rekening = Rekening::find($id);

        return \view('rekening.edit', [
            'judul_edit_rekening' => 'Edit Data Rekening',
            'data_supplier' => $data_supplier,
            'data_bank' => $data_bank,
            'rekening' => $rekening,
        ]);
    }

    public function update_rekening(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'supplier_id' => 'required|exists:supplier,id',
            'bank_id' => 'required|exists:bank,id',
            'nomor_rekening' => 'required',
        ]);
        $rekening = Rekening::find($id);
        $rekening->supplier_id = $request->supplier_id;
        $rekening->bank_id = $request->bank_id;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->save();
        
        return Redirect::route('rekening.index')
                        ->with('flash_message', 'Rekening Berhasil Diubah')
                        ->with('flash_type', 'edit');
    }

    public function delete_rekening($id) : RedirectResponse {
        $rekening = Rekening::find($id);
        $rekening->delete();

        return Redirect::route('rekening.index')
                        ->with('flash_message', 'Rekening Berhasil Dihapus')
                        ->with('flash_type', 'delete');
    }
}
