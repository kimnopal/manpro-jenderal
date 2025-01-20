<x-app-layout>  
    <div class="mt-3">  
        <h4>Edit Detail Invoice</h4>  
        <form action="{{ route('invoice_detail.update', $invoiceDetail->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25">  
            @csrf  
            @method('PUT')  
  
            <label for="invoice_id" class="form-label">Invoice ID:</label>  
            <input type="number" name="invoice_id" class="form-control mb-2" value="{{ $invoiceDetail->invoice_id }}" required>  
  
            <label for="deskripsi" class="form-label">Deskripsi:</label>  
            <input type="text" name="deskripsi" class="form-control mb-2" value="{{ $invoiceDetail->deskripsi }}" required>  
  
            <label for="harga" class="form-label">Harga:</label>  
            <input type="number" name="harga" class="form-control mb-2" value="{{ $invoiceDetail->harga }}" required>  
  
            <label for="qty" class="form-label">Qty:</label>  
            <input type="number" name="qty" class="form-control mb-2" value="{{ $invoiceDetail->qty }}" required>  
  
            <label for="total" class="form-label">Total:</label>  
            <input type="number" name="total" class="form-control mb-2" value="{{ $invoiceDetail->total }}" required>  
  
            <button class="btn btn-success mt-3" type="submit">  
                <i class="fa-solid fa-save"></i> Simpan Perubahan  
            </button>  
        </form>  
    </div>  
</x-app-layout>  
