<?php

namespace App\Http\Controllers;

use App\Helpers\Terbilang;
use App\Models\Invoice;
use App\Models\Client;
use App\Models\Kwitansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class KwitansiController extends Controller
{
    public function index_kwitansi() {  
        $data_kwitansi = Kwitansi::with(['invoice'])->filterKwitansi()->paginate(10);  
      
        return \view('kwitansi.index', [  
            'judul_index_kwitansi' => 'List Data Kwitansi',  
            'data_kwitansi' => $data_kwitansi,  
        ]);  
    }  
      
    
  
    public function create_kwitansi()
    {
        $data_invoice = Invoice::with('proyek.client')->get();

        return view('kwitansi.create', [
            'data_invoice' => $data_invoice
        ]);
    } 
  
    public function save_kwitansi(Request $request) : RedirectResponse {  
        

        $validated = $request->validate([
            'no_kwitansi' => 'required|unique:kwitansi,no_kwitansi',
            'invoice_id' => 'required|exists:invoice,id',
            'total' => 'required|numeric',
            'tanggal' => 'required|date'
        ]);

        $userInput = intval($request->no_kwitansi); // Pastikan ini adalah angka  
        $kwitansiNumber = $this->generateKwitansiNumber($userInput);  
    
        $existingKwitansi = Kwitansi::where('no_kwitansi', $kwitansiNumber)->first();  
        if ($existingKwitansi) {  
            return redirect()->back()->withErrors(['no_kwitansi' => 'No Kwitansi sudah ada.'])->withInput();  
        }  

        $kwitansi = new Kwitansi();  
        $kwitansi->no_kwitansi = $kwitansiNumber;  
        $kwitansi->invoice_id = $request->invoice_id;  
        $kwitansi->total = $request->total;  
        $kwitansi->tujuan = $request->tujuan;  
        $kwitansi->tanggal = $request->tanggal;  
        $kwitansi->save();  
  
        return Redirect::route('kwitansi.index');  
    }  
  
    public function edit_kwitansi($id) {  
        $kwitansi = Kwitansi::find($id);  
        $data_invoice = Invoice::with('proyek.client')->get();

        return \view('kwitansi.edit', [  
            'judul_edit_kwitansi' => 'Edit Data Kwitansi',  
            'kwitansi' => $kwitansi,  
            'data_invoice' => $data_invoice
        ]);  
    }  
  
    public function update_kwitansi(Request $request, $id) : RedirectResponse {  
        $kwitansi = Kwitansi::findOrFail($id);

        $validated = $request->validate([
            'no_kwitansi' => 'required|unique:kwitansi,no_kwitansi,' . $kwitansi->id, 
            'invoice_id' => 'required|exists:invoice,id',
            'total' => 'required',
            'tanggal' => 'required'
        ]);

        $userInput = intval($request->no_kwitansi);  
        $month = date('m');  
        $year = date('Y');  
        $newKwitansiNumber = sprintf('%03d/JSD/KWT/%s/%s', $userInput, $month, $year); 

        $kwitansi->no_kwitansi = $newKwitansiNumber;
        $kwitansi->invoice_id = $request->invoice_id;  
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

    public function generateKwitansiNumber($userInput) {   
        $month = date('m');  
        $year = date('Y');  
        return sprintf('%03d/JSD/KWT/%s/%s', $userInput, $month, $year);  
    }
    public function print_kwitansi($id) 
{
    $kwitansi = Kwitansi::with(['invoice.proyek.client', 'invoice.pembayaran'])
                  ->findOrFail($id);
    
    return view('kwitansi.print', compact('kwitansi'));
} 

}
