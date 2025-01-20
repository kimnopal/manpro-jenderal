<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class InvoiceDetailController extends Controller
{
    public function index_invoice_detail() {  
        $data_invoice_detail = InvoiceDetail::all();  
  
        return \view('invoice_detail.index', [  
            'judul_index_invoice_detail' => 'List Data Invoice Detail',  
            'data_invoice_detail' => $data_invoice_detail,  
        ]);  
    }  
  
    public function create_invoice_detail() {  
        return \view('invoice_detail.create', [  
            'judul_create_invoice_detail' => 'Tambah Data Invoice Detail'  
        ]);  
    }  
  
    public function save_invoice_detail(Request $request) : RedirectResponse {  
        $invoiceDetail = new InvoiceDetail();  
        $invoiceDetail->invoice_id = $request->invoice_id;  
        $invoiceDetail->deskripsi = $request->deskripsi;  
        $invoiceDetail->harga = $request->harga;  
        $invoiceDetail->qty = $request->qty;  
        $invoiceDetail->total = $request->total;  
        $invoiceDetail->save();  
  
        return Redirect::route('invoice_detail.index');  
    }  
  
    public function edit_invoice_detail($id) {  
        $invoiceDetail = InvoiceDetail::find($id);  
  
        return \view('invoice_detail.edit', [  
            'judul_edit_invoice_detail' => 'Edit Data Invoice Detail',  
            'invoiceDetail' => $invoiceDetail,  
        ]);  
    }  
  
    public function update_invoice_detail(Request $request, $id) : RedirectResponse {  
        $invoiceDetail = InvoiceDetail::find($id);  
        $invoiceDetail->invoice_id = $request->invoice_id;  
        $invoiceDetail->deskripsi = $request->deskripsi;  
        $invoiceDetail->harga = $request->harga;  
        $invoiceDetail->qty = $request->qty;  
        $invoiceDetail->total = $request->total;  
        $invoiceDetail->save();  
  
        return Redirect::route('invoice_detail.index');  
    }  
  
    public function delete_invoice_detail($id) : RedirectResponse {  
        $invoiceDetail = InvoiceDetail::find($id);  
        $invoiceDetail->delete();  
  
        return Redirect::route('invoice_detail.index');  
    }
}
