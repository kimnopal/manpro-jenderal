<x-app-layout>  
    <div class="container mt-5">  
        <h4 class="mb-4">Edit Pembayaran</h4>  
        <form action="{{ route('pembayaran.update', ['invoice_id' => $pembayaran->invoice_id, 'id' => $pembayaran->id]) }}" method="POST" class="border border-2 rounded p-4 bg-warning bg-opacity-25 shadow">  
            @csrf  
            @method('PUT')
              
            <div class="mb-3">  
            <label for="termin_no" class="form-label">Termin ke-</label>
                <input type="number" class="form-control" id="termin_no" name="termin_no" 
                    value="{{ old('termin_no', $pembayaran->termin_no) }}" min="1" required>
            </div>  
  
            <div class="mb-3">  
                <label for="status" class="form-label">Status:</label>  
                <select name="status" class="form-select" required>  
                    <option value="paid" {{ $pembayaran->status == 'paid' ? 'selected' : '' }}>Paid</option>  
                    <option value="unpaid" {{ $pembayaran->status == 'unpaid' ? 'selected' : '' }}>Unpaid</option>  
                    <option value="pending" {{ $pembayaran->status == 'pending' ? 'selected' : '' }}>Pending</option>  
                </select>  
            </div>  
  
            <div class="mb-3">  
                <label for="nominal" class="form-label">Nominal:</label>  
                <input type="number" name="nominal" class="form-control" value="{{ $pembayaran->nominal }}" placeholder="Masukkan Nominal" required>  
            </div>  
  
            <div class="mb-3">  
                <label for="kode_pembayaran" class="form-label">Kode Pembayaran:</label>  
                <input type="text" name="kode_pembayaran" class="form-control" value="{{ $pembayaran->kode_pembayaran }}" placeholder="Masukkan Kode Pembayaran" required>  
            </div>  
  
            <button type="submit" class="btn btn-success mt-3">  
                <i class="fa-solid fa-arrow-up-from-bracket"></i> Update Pembayaran  
            </button>  
        </form>  
    </div>  
</x-app-layout>  
