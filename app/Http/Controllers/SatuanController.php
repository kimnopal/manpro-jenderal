<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index_satuan() {
        $data_satuan = Satuan::filternama()->paginate(5);

        return \view('satuan.index', [
            'judul_index_satuan' => 'List Data Satuan',
            'data_satuan' => $data_satuan,
        ]);
    }

    public function create_satuan() {

        return \view('satuan.create', [
            'judul_create_satuan' => 'Tambah Data Satuan'
        ]);
    }

    public function save_satuan(Request $request) : RedirectResponse {
        $validated = $request->validate([
            'nama_satuan' => 'required'
        ]);
        $satuan = new Satuan();
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->save();

        return Redirect::route('satuan.index');
    }

    public function edit_satuan($id) {
        $satuan = Satuan::find($id);

        return \view('satuan.edit', [
            'judul_edit_satuan' => 'Edit Data Satuan',
            'satuan' => $satuan,
        ]);
    }

    public function update_satuan(Request $request, $id) : RedirectResponse {
        $validated = $request->validate([
            'nama_satuan' => 'required',
        ]);
        $satuan = Satuan::find($id);
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->save();

        return Redirect::route('satuan.index');
    }

    public function delete_satuan($id) : RedirectResponse {
        $satuan = Satuan::find($id);
        $satuan->delete();

        return Redirect::route('satuan.index');
    }
}
