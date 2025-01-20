<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index_pembayaran() {
        $data_pembayaran = Pembayaran::all();

        return \view('pembayaran.index', [
            'judul_index_pembayaran' => 'List Data pembayaran',
            'data_pembayaran' => $data_pembayaran,
        ]);
    }
    
    public function create_pembayaran() {
        
        return \view('pembayaran.create', [
            'judul_create_pembayaran' => 'Tambah Data pembayaran'
        ]);
    }

    public function save_pembayaran(Request $request) : RedirectResponse {
        $pembayaran = new Pembayaran();
        $pembayaran->id_proyek = $request->id_proyek;
        $pembayaran->status = $request->status;
        $pembayaran->nominal = $request->nominal;  
        $pembayaran->kode_pembayaran = $request->kode_pembayaran;
        $pembayaran->save();

        return Redirect::route('pembayaran.index');
    }

    public function edit_pembayaran($id) {
        $pembayaran = Pembayaran::find($id);

        return \view('pembayaran.edit', [
            'judul_edit_pembayaran' => 'Edit Data pembayaran',
            'pembayaran' => $pembayaran,
        ]);
    }

    public function update_pembayaran(Request $request, $id) : RedirectResponse {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->id_proyek = $request->id_proyek;
        $pembayaran->status = $request->status;
        $pembayaran->nominal = $request->nominal;  
        $pembayaran->kode_pembayaran = $request->kode_pembayaran;
        $pembayaran->save();

        return Redirect::route('pembayaran.index');
    }

    public function delete_pembayaran($id) : RedirectResponse {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        return Redirect::route('pembayaran.index');
    }
}
