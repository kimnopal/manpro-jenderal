<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Invoice;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    public function index_invoice() {  
        $data_invoice = Invoice::with(['client'])->filterInvoice()->paginate(8);

        return \view('invoice.index', [  
            'judul_index_invoice' => 'List Data Invoice',  
            'data_invoice' => $data_invoice,  
        ]);  
    }  
  
    public function create_invoice() {  
        $data_client = Client::all();

        return \view('invoice.create', [  
            'judul_create_invoice' => 'Tambah Data Invoice',
            'data_client' => $data_client,  
        ]);  
    }  
  
    public function save_invoice(Request $request): RedirectResponse  {  
        $validated = $request->validate([  
            'no_invoice' => 'required|unique:invoice,no_invoice',  
            'client_id' => 'required|exists:client,id',  
            'tanggal' => 'required',  
        ]);  
    
        $userInput = intval($request->no_invoice); // Pastikan ini adalah angka  
  
        $invoiceNumber = $this->generateInvoiceNumber($userInput);  
    
        $existingInvoice = Invoice::where('no_invoice', $invoiceNumber)->first();  
        if ($existingInvoice) {  
            return redirect()->back()->withErrors(['no_invoice' => 'No Invoice sudah ada.'])->withInput();  
        }  
  
        $invoice = new Invoice();  
        $invoice->no_invoice = $invoiceNumber; // Gunakan nomor invoice yang dihasilkan  
        $invoice->client_id = $request->client_id;  
        $invoice->tanggal = $request->tanggal;  
        $invoice->catatan = $request->catatan;  
        $invoice->save();  
  
        return redirect()->route('invoice.index')->with('success', 'Invoice berhasil disimpan!');  
    }  
  
  
    public function edit_invoice($id) {  
        $invoice = Invoice::find($id);  
        $data_client = Client::all();
  
        return \view('invoice.edit', [  
            'judul_edit_invoice' => 'Edit Data Invoice',  
            'invoice' => $invoice,  
            'data_client' => $data_client,
        ]);  
    }  
  
    public function update_invoice(Request $request, $id) : RedirectResponse {  
        $validate = $request->validate([
            'no_invoice' => 'required|unique:invoice,no_invoice',
            'client_id' => 'required|exists:client,id',
            'tanggal' => 'required',
        ]);
 
        $invoice = Invoice::findOrFail($id);  
   
        $userInput = intval($request->no_invoice); // Pastikan ini adalah angka  
  
        $month = date('m'); // 2 digit bulan  
        $year = date('Y');  // 4 digit tahun  
        $newInvoiceNumber = sprintf('%03d/INV/%s/%s', $userInput, $month, $year); 

        $invoice = Invoice::find($id);  
        $invoice->no_invoice = $newInvoiceNumber;  
        $invoice->client_id = $request->client_id;  
        $invoice->tanggal = $request->tanggal;  
        $invoice->catatan = $request->catatan;  
        $invoice->save();  
  
        return Redirect::route('invoice.index');  
    }  
  
    public function delete_invoice($id) : RedirectResponse {  
        $invoice = Invoice::find($id);  
        $invoice->delete();  
  
        return Redirect::route('invoice.index');  
    }

    public function generateInvoiceNumber($userInput)  {   
        $month = date('m'); // 2 digit bulan  
        $year = date('Y');  // 4 digit tahun  
  
        // Format nomor invoice  
        return sprintf('%03d/INV/%s/%s', $userInput, $month, $year);  
    }  
}
