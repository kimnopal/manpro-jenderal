<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class InvoiceDetailController extends Controller
{  
    public function create_invoice_detail($invoice_id)
    {
        $invoice = Invoice::findOrFail($invoice_id);

        return view('invoice_detail.create', compact('invoice'));
    }  
  
    public function save_invoice_detail(Request $request, $invoice_id): RedirectResponse
    {
        $invoice = Invoice::findOrFail($invoice_id);

        $validated = $request->validate([
            'invoice_id' => 'required|exists:invoice,id',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'qty' => 'required|integer|min:1',
        ]);

        $existingDetail = InvoiceDetail::where('invoice_id', $request->invoice_id)->first();
        if ($existingDetail) {
            return back()->with('error', 'Invoice ini sudah memiliki detail!');
        }
        //dd($request->all());

        $invoice_detail = new InvoiceDetail();
        $invoice_detail->invoice_id = $invoice->id;
        $invoice_detail->deskripsi = $request->deskripsi;
        $invoice_detail->harga = $request->harga;
        $invoice_detail->qty = $request->qty;
        $invoice_detail->total = $request->harga * $request->qty;
        $invoice_detail->save();


        return Redirect::route('detail.invoice', ['id' => $invoice_id])
            ->with('success', 'Detail invoice berhasil disimpan.');
    } 
  
    public function edit_invoice_detail($invoice_id)
    {
        $detail = InvoiceDetail::where('invoice_id', $invoice_id)->firstOrFail();
        return view('invoice_detail.edit', compact('detail'));
    }
    

  
    public function update_invoice_detail(Request $request, $invoice_id): RedirectResponse
    {
        $invoiceDetail = InvoiceDetail::findOrFail($invoice_id);
        $invoice_id = $invoiceDetail->invoice_id; // Ambil invoice_id untuk redirect

        $validated = $request->validate([
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'qty' => 'required|integer|min:1',
        ]);

        $invoiceDetail->update($validated + ['total' => $request->harga * $request->qty]);

        return Redirect::route('detail.invoice', ['id' => $invoice_id])
            ->with('success', 'Detail invoice berhasil diperbarui.');
    }

  
    public function delete_invoice_detail($invoice_id): RedirectResponse
    {
        $invoiceDetail = InvoiceDetail::findOrFail($invoice_id);
        $invoice_id = $invoiceDetail->invoice_id;

        $invoiceDetail->delete();

        return Redirect::route('detail.invoice', ['id' => $invoice_id])
            ->with('success', 'Detail invoice berhasil dihapus.');
    }
}
