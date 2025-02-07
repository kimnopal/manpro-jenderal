<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class InvoiceDetailController extends Controller
{
    public function detail_invoice($id) {
        $data_invoice = Invoice::with(['proyek.client', 'detail'])->where('id', $id)->firstOrFail();
    
        if (!$data_invoice) {
            abort(404);
        }
    
        return view('invoice_detail.index', [
            'judul_index_invoice_detail' => 'List Data Invoice Detail',
            'data_invoice' => $data_invoice,
            'data_detail' => $data_invoice->detail, // Ambil data detail dari relasi
        ]);
    }

  
    public function create_invoice_detail($invoice_id) {
        $data_invoice = Invoice::findOrFail($invoice_id);
    
        // Mengirim data_invoice ke view 'invoice_detail.create'
        return Redirect::route('detail_invoice.create', [
            'data_invoice' => $data_invoice])->with('success', 'Detail invoice berhasil disimpan.');
    }  
  
    public function save_invoice_detail(Request $request, $invoice_id) : RedirectResponse {
        // Cek apakah invoice sudah memiliki detail
        $existingDetail = InvoiceDetail::where('invoice_id', $invoice_id)->first();
    
        if ($existingDetail) {
            return Redirect::route('detail_invoice.index', ['id' => $invoice_id])
                ->with('error', 'Detail untuk invoice ini sudah ada.');
        }
    
        // Validasi input
        $request->validate([
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'qty' => 'required|integer|min:1',
        ]);
    
        // Simpan data invoice detail
        $invoiceDetail = new InvoiceDetail();
        $invoiceDetail->invoice_id = $invoice_id;
        $invoiceDetail->deskripsi = $request->deskripsi;
        $invoiceDetail->harga = $request->harga;
        $invoiceDetail->qty = $request->qty;
        $invoiceDetail->total = $request->harga * $request->qty; // Hitung total
        $invoiceDetail->save();
    
        return Redirect::route('detail_invoice.index', ['id' => $invoice_id])
            ->with('success', 'Detail invoice berhasil disimpan.');
    }
      
  
    public function edit_invoice_detail($id) {  
        $data_invoice = Invoice::findOrFail($id);
  
        return \view('invoice_detail.edit', [  
            'judul_edit_invoice_detail' => 'Edit Data Invoice Detail',  
            'invoiceDetail' => $data_invoice,  
        ]);  
    }  
  
    public function update_invoice_detail(Request $request, $detail_id) : RedirectResponse {
        $invoiceDetail = InvoiceDetail::find($detail_id);
        // Ambil invoice_id dari data yang sudah ada
        $invoice_id = $invoiceDetail->invoice_id; 
    
        // Update data
        $invoiceDetail->deskripsi = $request->deskripsi;
        $invoiceDetail->harga = $request->harga;
        $invoiceDetail->qty = $request->qty;
        $invoiceDetail->total = $request->harga * $request->qty;
        $invoiceDetail->save();
    
        return Redirect::route('detail_invoice.index', ['invoice_id' => $invoice_id])
        ->with('success', 'Detail invoice berhasil diperbarui.');
    }
  
    public function delete_invoice_detail($detail_id) : RedirectResponse {
        $invoiceDetail = InvoiceDetail::find($detail_id);
        $invoice_id = $invoiceDetail->invoice_id; // Simpan invoice_id sebelum dihapus
        $invoiceDetail->delete();
    
        return Redirect::route('detail_invoice.index', ['invoice_id' => $invoice_id])
            ->with('success', 'Detail invoice berhasil dihapus.');
    }
}
