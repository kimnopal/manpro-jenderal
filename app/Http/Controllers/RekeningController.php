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
        $data_rekening = Rekening::with(['supplier', 'bank'])->filterSupplier()->latest()->paginate(10)->withQueryString();

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
            'nomor_rekening' => 'required|integer',
            'supplier_id' => 'required|exists:supplier,id',
            'bank_id' => 'required|exists:bank,id',
        ],
        [
            'nomor_rekening.required' => 'Nomor rekening perlu diisi',
            'nomor_rekening.integer' => 'Nomor rekening hanya diisi angka'
        ]);
        $cek_rekening = Rekening::where('nomor_rekening', $request->nomor_rekening)->exists();
        $cek_bank = Rekening::where('bank_id', $request->bank_id)
                                ->where('nomor_rekening', $request->nomor_rekening)
                                ->exists();
        $cek_supplier = Rekening::where('supplier_id', $request->supplier_id)
                                ->where('nomor_rekening', $request->nomor_rekening)
                                ->exists();
        if ($cek_bank) {
            return Redirect::back()
                            ->with('create_error', 'Data sudah ada!')
                            ->with('error_message', 'Nomor rekening untuk bank yang dipilih sudah ada')
                            ->withInput();
        }
        else if ($cek_supplier) {
            return Redirect::back()
                            ->with('create_error', 'Data sudah ada!')
                            ->with('error_message', 'Nomor rekening untuk supplier yang dipilih sudah ada')
                            ->withInput();
        }
        else if ($cek_rekening) {
            return Redirect::back()
                            ->with('create_error', 'Data sudah ada!')
                            ->with('error_message', 'Nomor rekening sudah ada')
                            ->withInput();
        }
        $rekening = new Rekening();
        $rekening->supplier_id = $request->supplier_id;
        $rekening->bank_id = $request->bank_id;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->save();

        return Redirect::route('rekening.index')
                        ->with('flash_message', 'Rekening Berhasil Dibuat')
                        ->with('flash_type', 'Saved!');
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
            'nomor_rekening' => 'required|integer',
        ],
        [
            'nomor_rekening.required' => 'Nomor rekening perlu diisi',
            'nomor_rekening.integer' => 'Nomor rekening hanya diisi angka'
        ]);
        $cek_rekening = Rekening::where('nomor_rekening', $request->nomor_rekening)
                                ->where('supplier_id', $request->supplier_id)
                                ->where('bank_id', $request->bank_id)
                                ->doesntExist();
        $cek_supplier = Rekening::where('supplier_id', $request->supplier_id)
                                ->where('nomor_rekening', $request->nomor_rekening)
                                ->exists();
        $cek_bank = Rekening::where('bank_id', $request->bank_id)
                            ->where('nomor_rekening', $request->nomor_rekening)
                            ->exists();
        $cek_duplikasi = Rekening::where('nomor_rekening', $request->nomor_rekening)
                                ->exists();
        if ($cek_rekening) {
            if ($cek_supplier) {
                return Redirect::back()
                                ->withInput()
                                ->with('save_error', 'Gagal Mengubah Data')
                                ->with('error_message', 'Nomor rekening untuk supplier yang dipilih sudah ada');
            } 
            else if ($cek_bank) {
                return Redirect::back()
                                ->withInput()
                                ->with('save_error', 'Gagal Mengubah Data')
                                ->with('error_message', 'Nomor rekening untuk bank yang dipilih sudah ada');
            }
            else if ($cek_duplikasi) {
                return Redirect::back()
                                ->withInput()
                                ->with('save_error', 'Gagal Mengubah Data')
                                ->with('error_message', 'Nomor rekening sudah ada');
            }
        }
        
        $rekening = Rekening::find($id);
        $rekening->supplier_id = $request->supplier_id;
        $rekening->bank_id = $request->bank_id;
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->save();
        
        return Redirect::route('rekening.index')
                        ->with('flash_message', 'Rekening Berhasil Diubah')
                        ->with('flash_type', 'Updated!');
    }

    public function delete_rekening($id) : RedirectResponse {
        $rekening = Rekening::find($id);
        $rekening->delete();

        return Redirect::route('rekening.index')
                        ->with('flash_message', 'Rekening Berhasil Dihapus')
                        ->with('flash_type', 'Deleted!');
    }
}
