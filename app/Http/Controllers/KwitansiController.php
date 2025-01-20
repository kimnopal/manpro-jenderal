<?php

namespace App\Http\Controllers;

use App\Models\Kwitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class KwitansiController extends Controller
{
    public function index_kwitansi(Request $request) {  
        $query = Kwitansi::query();  
      
        // Cek apakah ada parameter pencarian  
        if ($request->has('search') && $request->search != '') {  
            $searchTerm = $request->search;  
      
            // Tambahkan kondisi pencarian untuk semua kolom yang relevan  
            $query->where(function($q) use ($searchTerm) {  
                $q->where('client', 'like', "%{$searchTerm}%")  
                  ->orWhere('total', 'like', "%{$searchTerm}%")  
                  ->orWhere('tujuan', 'like', "%{$searchTerm}%")  
                  ->orWhere('tanggal', 'like', "%{$searchTerm}%");  
            });  
        }  
      
        $data_kwitansi = $query->get();  
      
        return view('kwitansi.index', [  
            'judul_index_kwitansi' => 'List Data Kwitansi',  
            'data_kwitansi' => $data_kwitansi,  
        ]);  
    }  
      
    
  
    public function create_kwitansi() {  
        return \view('kwitansi.create', [  
            'judul_create_kwitansi' => 'Tambah Data Kwitansi'  
        ]);  
    }  
  
    public function save_kwitansi(Request $request) : RedirectResponse {  
        $kwitansi = new Kwitansi();  
        $kwitansi->client = $request->client;  
        $kwitansi->total = $request->total;  
        $kwitansi->tujuan = $request->tujuan;  
        $kwitansi->tanggal = $request->tanggal;  
        $kwitansi->save();  
  
        return Redirect::route('kwitansi.index');  
    }  
  
    public function edit_kwitansi($id) {  
        $kwitansi = Kwitansi::find($id);  
  
        return \view('kwitansi.edit', [  
            'judul_edit_kwitansi' => 'Edit Data Kwitansi',  
            'kwitansi' => $kwitansi,  
        ]);  
    }  
  
    public function update_kwitansi(Request $request, $id) : RedirectResponse {  
        $kwitansi = Kwitansi::find($id);  
        $kwitansi->client = $request->client;  
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
