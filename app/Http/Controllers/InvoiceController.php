<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class InvoiceController extends Controller
{
    public function index_invoice() {  
        $data_invoice = Invoice::all();  
  
        return \view('invoice.index', [  
            'judul_index_invoice' => 'List Data Invoice',  
            'data_invoice' => $data_invoice,  
        ]);  
    }  
  
    public function create_invoice() {  
        return \view('invoice.create', [  
            'judul_create_invoice' => 'Tambah Data Invoice'  
        ]);  
    }  
  
    public function save_invoice(Request $request) : RedirectResponse {  
        $invoice = new Invoice();  
        $invoice->no_invoice = $request->no_invoice;  
        $invoice->client = $request->client;  
        $invoice->tanggal = $request->tanggal;  
        $invoice->catatan = $request->catatan;  
        $invoice->save();  
  
        return Redirect::route('invoice.index');  
    }  
  
    public function edit_invoice($id) {  
        $invoice = Invoice::find($id);  
  
        return \view('invoice.edit', [  
            'judul_edit_invoice' => 'Edit Data Invoice',  
            'invoice' => $invoice,  
        ]);  
    }  
  
    public function update_invoice(Request $request, $id) : RedirectResponse {  
        $invoice = Invoice::find($id);  
        $invoice->no_invoice = $request->no_invoice;  
        $invoice->client = $request->client;  
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
}
