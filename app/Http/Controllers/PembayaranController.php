<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Pembayaran;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    // public function index_pembayaran() {
    //     $data_pembayaran = Pembayaran::all();

    //     return \view('pembayaran.index', [
    //         'judul_index_pembayaran' => 'List Data pembayaran',
    //         'data_pembayaran' => $data_pembayaran,
    //     ]);
    // }
    
    public function create_pembayaran($invoice_id)
    {
        $invoice = Invoice::findOrFail($invoice_id);
        return view('pembayaran.create', compact('invoice'));
    }

    public function save_pembayaran(Request $request, $invoice_id)
    {
        $invoice = Invoice::findOrFail($invoice_id);

        $validated = $request->validate([
            'invoice_id' => 'required|exists:invoice,id',
            'termin_no' => 'required|integer|min:1',
            'nominal' => 'required|numeric|min:1',
            'status' => 'required|in:unpaid,paid,pending',
            'kode_pembayaran' => 'nullable|string|max:255'
        ]);

        Pembayaran::create($validated);

        return Redirect::route('detail.invoice', ['id' => $invoice_id])
            ->with('success', 'Termin pembayaran berhasil ditambahkan!');
    }

    public function edit_pembayaran($invoice_id, $id)
    {
        // Dapatkan data invoice
        $invoice = Invoice::findOrFail($invoice_id);
        
        // Dapatkan data pembayaran yang terkait dengan invoice tersebut
        $pembayaran = Pembayaran::where('invoice_id', $invoice_id)
                        ->findOrFail($id);
                        
        // Kirim semua data yang diperlukan ke view
        return view('pembayaran.edit', compact('invoice', 'pembayaran'));
    }

// UPDATE Data
public function update_pembayaran(Request $request, $invoice_id, $id)
{
    $validated = $request->validate([
        'termin_no' => 'required|integer|min:1',
        'nominal' => 'required|numeric|min:0',
        'status' => 'required|in:paid,unpaid,pending',
        'kode_pembayaran' => 'nullable|string|max:255'
    ]);

    $pembayaran = Pembayaran::where('invoice_id', $invoice_id)
                    ->findOrFail($id);
                    
    $pembayaran->update($validated);

    return redirect()->route('detail.invoice', $invoice_id)
        ->with('success', 'Pembayaran berhasil diperbarui!');
}

// DELETE Data
    public function delete_pembayaran($id)
    {
        $pembayaran = pembayaran::findOrFail($id);
        $invoice_id = $pembayaran->invoice_id;

        $pembayaran->delete();

        return Redirect::route('detail.invoice', $invoice_id)
            ->with('success', 'Termin pembayaran berhasil dihapus!');
    }

    public function print($invoice_id, $id)
{
    // Validasi invoice exists
    $invoice = Invoice::findOrFail($invoice_id);
    
    // Get payment data and validate it belongs to invoice
    $pembayaran = Pembayaran::where('invoice_id', $invoice_id)
                    ->findOrFail($id);
    
    // Load relationships
    $invoice->load(['proyek.client', 'details']);
    
    return view('pembayaran.print', [
        'invoice' => $invoice,
        'pembayaran' => $pembayaran
    ]);
}
}
