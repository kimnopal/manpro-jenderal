<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index_bank() {
        $data_bank = Bank::filternama()->paginate(5);

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
        $validated = $request->validate([
            'nama_bank' => 'required',
        ]);
        $bank = new Bank();
        $bank->nama_bank = $request->nama_bank;
        $bank->save();

        return Redirect::route('bank.index');
    }

    public function edit_bank($id) {
        $bank = Bank::find($id);

        return \view('bank.edit', [
            'judul_edit_bank' => 'Edit Data Bank',
            'bank' => $bank,
        ]);
    }

    public function update_bank(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'nama_bank' => 'required',
        ]);
        $bank = Bank::find($id);
        $bank->nama_bank = $request->nama_bank;
        $bank->save();

        return Redirect::route('bank.index');
    }

    public function delete_bank($id) : RedirectResponse {
        $bank = Bank::find($id);
        $bank->delete();

        return Redirect::route('bank.index');
    }
}
