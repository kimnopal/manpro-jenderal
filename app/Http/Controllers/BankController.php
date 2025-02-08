<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Rekening;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index_bank() {
        $data_bank = Bank::filternama()->latest()->paginate(5)->withQueryString();

        return \view('bank.index', [
            'judul_index_bank' => 'List Data Bank',
            'data_bank' => $data_bank,
        ]);
    }
    
    public function create_bank() {
        
        return \view('bank.create', [
            'judul_create_bank' => 'Tambah Data Bank'
        ]);
    }

    public function save_bank(Request $request) : RedirectResponse {
        $cek_bank = Bank::where('nama_bank', $request->nama_bank)
                        ->exists();
        if ($cek_bank) {
            return Redirect::back()
                            ->withInput()
                            ->with('save_error', 'Gagal Menyimpan Bank')
                            ->with('error_message', 'Nama bank sudah ada');
        }
        $validated = $request->validate([
            'nama_bank' => 'required',
        ]);
        $bank = new Bank();
        $bank->nama_bank = $request->nama_bank;
        $bank->save();

        return Redirect::route('bank.index')
                        ->with('flash_message', 'Bank Berhasil Dibuat')
                        ->with('flash_type', 'Saved!');
    }

    public function edit_bank($id) {
        $bank = Bank::find($id);

        return \view('bank.edit', [
            'judul_edit_bank' => 'Edit Data Bank',
            'bank' => $bank,
        ]);
    }

    public function update_bank(Request $request, $id) : RedirectResponse {
        $cek_bank = Bank::where('nama_bank', $request->nama_bank)
                        ->exists();
        $cek_duplikasi = Bank::find($id)->nama_bank == $request->nama_bank;
        if ($cek_bank) {
            if (!$cek_duplikasi) {
                return Redirect::back()
                                ->withInput()
                                ->with('update_error', 'Gagal Mengubah Bank')
                                ->with('error_message', 'Nama bank sudah ada');
            }
        }
        $validated = $request->validate([
            'nama_bank' => 'required',
        ]);
        $bank = Bank::find($id);
        $bank->nama_bank = $request->nama_bank;
        $bank->save();

        return Redirect::route('bank.index')
                        ->with('flash_message', 'Bank Berhasil Diubah')
                        ->with('flash_type', 'Updated!');
    }

    public function delete_bank($id) : RedirectResponse {
        $cek_rekening = Rekening::where('bank_id', $id)->exists();
        if ($cek_rekening) {
            return Redirect::back()->with('delete_error', 'Bank tidak dapat dihapus karena digunakan dalam Tabel Rekening');
        }
        $bank = Bank::find($id);
        $bank->delete();

        return Redirect::route('bank.index')
                        ->with('flash_message', 'Bank Berhasil Dihapus')
                        ->with('flash_type', 'Deleted!');
    }
}
