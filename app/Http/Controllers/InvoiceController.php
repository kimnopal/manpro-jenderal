<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    public function index_invoice() {  
        // Ambil data invoice dengan proyek dan client
        $data_invoice = Invoice::with(['proyek.client'])->filterInvoice()->paginate(5);

        return \view('invoice.index', [  
            'judul_index_invoice' => 'List Data Invoice',  
            'data_invoice' => $data_invoice,  
        ]);  
    }  
  
    public function create_invoice() {  
        // Ambil proyek beserta clientnya
        $data_proyek = Proyek::with('client')->get();

        return \view('invoice.create', [  
            'judul_create_invoice' => 'Tambah Data Invoice',
            'data_proyek' => $data_proyek,  
        ]);  
    }  
  
    public function save_invoice(Request $request): RedirectResponse  {  
        $validated = $request->validate([  
            'no_invoice' => 'required|unique:invoice,no_invoice',  
            'proyek_id' => 'required|exists:proyek,id',  
            'tanggal' => 'required',  
        ]);  
    
        $userInput = intval($request->no_invoice); // Pastikan ini adalah angka  
        $invoiceNumber = $this->generateInvoiceNumber($userInput);  
    
        $existingInvoice = Invoice::where('no_invoice', $invoiceNumber)->first();  
        if ($existingInvoice) {  
            return redirect()->back()->withErrors(['no_invoice' => 'No Invoice sudah ada.'])->withInput();  
        }  
    
        $invoice = new Invoice();  
        $invoice->no_invoice = $invoiceNumber;  
        $invoice->proyek_id = $request->proyek_id;  // Simpan berdasarkan proyek, bukan client
        $invoice->tanggal = $request->tanggal;  
        $invoice->catatan = $request->catatan;  
        $invoice->save();  
    
        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil disimpan!');  
    }  
  
    public function edit_invoice($id) {  
        $invoice = Invoice::find($id);  
        $data_proyek = Proyek::with('client')->get(); // Ambil proyek dengan client
  
        return \view('invoice.edit', [  
            'judul_edit_invoice' => 'Edit Data Invoice',  
            'invoice' => $invoice,  
            'data_proyek' => $data_proyek,
        ]);  
    }  
  
    public function update_invoice(Request $request, $id) : RedirectResponse {  
        $invoice = Invoice::findOrFail($id);  
    
        $validate = $request->validate([
            'no_invoice' => 'required|unique:invoice,no_invoice,' . $invoice->id,  
            'proyek_id' => 'required|exists:proyek,id',  
            'tanggal' => 'required',
        ]);
    
        $userInput = intval($request->no_invoice);  
        $month = date('m');  
        $year = date('Y');  
        $newInvoiceNumber = sprintf('%03d/JSD/INV/%s/%s', $userInput, $month, $year); 
    
        $invoice->no_invoice = $newInvoiceNumber;  
        $invoice->proyek_id = $request->proyek_id;  
        $invoice->tanggal = $request->tanggal;  
        $invoice->catatan = $request->catatan;  
        $invoice->save();  
    
        return Redirect::route('invoice.index')->with('success', 'Invoice berhasil diupdate!');  
    }
  
    public function delete_invoice($id) : RedirectResponse {  
        $invoice = Invoice::find($id);  
        $invoice->delete();  
  
        return Redirect::route('invoice.index');  
    }

    public function generateInvoiceNumber($userInput) {   
        $month = date('m');  
        $year = date('Y');  
        return sprintf('%03d/JSD/INV/%s/%s', $userInput, $month, $year);  
    }
}
