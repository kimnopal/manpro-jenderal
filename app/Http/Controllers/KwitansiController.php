<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Kwitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class KwitansiController extends Controller
{
    public function index_kwitansi() {  
        $data_kwitansi = Kwitansi::with(['client'])->filterKwitansi()->paginate(10);  
      
        return \view('kwitansi.index', [  
            'judul_index_kwitansi' => 'List Data Kwitansi',  
            'data_kwitansi' => $data_kwitansi,  
        ]);  
    }  
      
    
  
    public function create_kwitansi() {  
        $data_client = Client::all();

        return \view('kwitansi.create', [  
            'judul_create_kwitansi' => 'Tambah Data Kwitansi',
            'data_client' => $data_client,
        ]);  
    }  
  
    public function save_kwitansi(Request $request) : RedirectResponse {  
        $validated = $request->validate([
            'client_id' => 'required|exists:client,id',
            'total' => 'required',
            'tanggal' => 'required'
        ]);

        $kwitansi = new Kwitansi();  
        $kwitansi->client_id= $request->client_id;  
        $kwitansi->total = $request->total;  
        $kwitansi->tujuan = $request->tujuan;  
        $kwitansi->tanggal = $request->tanggal;  
        $kwitansi->save();  
  
        return Redirect::route('kwitansi.index');  
    }  
  
    public function edit_kwitansi($id) {  
        $kwitansi = Kwitansi::find($id);  
        $data_client = Client::all();
  
        return \view('kwitansi.edit', [  
            'judul_edit_kwitansi' => 'Edit Data Kwitansi',  
            'kwitansi' => $kwitansi,  
            'data_client' => $data_client
        ]);  
    }  
  
    public function update_kwitansi(Request $request, $id) : RedirectResponse {  
        $kwitansi = Kwitansi::findOrFail($id);

        $validated = $request->validate([
            'client_id' => 'required|exists:client,id',
            'total' => 'required',
            'tanggal' => 'required'
        ]);

        $kwitansi->client_id = $request->client_id;  
        $kwitansi->total = $request->total;  
        $kwitansi->tujuan = $request->tujuan;  
        $kwitansi->tanggal = $request->tanggal;  
        $kwitansi->save();  
  
        return Redirect::route('kwitansi.index');  
    }  
  
    public function delete_kwitansi($id) : RedirectResponse {  
        $kwitansi = Kwitansi::find($id);  
        $kwitansi->delete();  
  
        return Redirect::route('kwitansi.index');  
    }  

    public function print_kwitansi($id)  {  
    $kwitansi = Kwitansi::findOrFail($id); // Mengambil data kwitansi berdasarkan ID  
  
    return view('kwitansi.print', compact('kwitansi')); // Mengembalikan view untuk mencetak  
    }  

}
