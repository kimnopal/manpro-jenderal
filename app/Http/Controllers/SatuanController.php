<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Satuan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    public function index_satuan() {
        $data_satuan = Satuan::filternama()->latest()->paginate(5)->withQueryString();

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

        return Redirect::route('satuan.index')
                        ->with('flash_message', 'Satuan Berhasil Dibuat')
                        ->with('flash_type', 'Saved!');
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

        return Redirect::route('satuan.index')
                        ->with('flash_message', 'Satuan Berhasil Diubah')
                        ->with('flash_type', 'Updated!');
    }

    public function delete_satuan($id) : RedirectResponse {
        $satuan = Satuan::find($id);
        $cek_item = $satuan->item('satuan_id', $id)->exists();
        if ($cek_item) {
            return Redirect::back()->with('delete_error', 'Satuan tidak dapat dihapus karena digunakan dalam Tabel Item');
        }
        $satuan->delete();

        return Redirect::route('satuan.index')
                        ->with('flash_message', 'Satuan Berhasil Dihapus')
                        ->with('flash_type', 'Deleted!');
    }
}
