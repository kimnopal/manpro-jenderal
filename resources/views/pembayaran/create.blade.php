<x-app-layout>  
    <div class="container mt-5">  
        <h4 class="mb-4">Tambah Pembayaran</h4>  
        <form action="{{ route('pembayaran.save') }}" method="POST" class="border border-2 rounded p-4 bg-warning bg-opacity-25 shadow">  
            @csrf  
            <div class="mb-3">  
                <label for="id_proyek" class="form-label">Proyek ID:</label>  
                <input type="text" name="id_proyek" class="form-control" placeholder="Masukkan ID Proyek" autofocus required>  
            </div>  
  
            <div class="mb-3">  
                <label for="status" class="form-label">Status:</label>  
                <select name="status" class="form-select" required>  
                    <option value="paid">Paid</option>  
                    <option value="unpaid" selected>Unpaid</option>  
                    <option value="pending">Pending</option>  
                </select>  
            </div>  
  
            <div class="mb-3">  
                <label for="nominal" class="form-label">Nominal:</label>  
                <input type="number" name="nominal" class="form-control" placeholder="Masukkan Nominal" required>  
            </div>  
  
            <div class="mb-3">  
                <label for="kode_pembayaran" class="form-label">Kode Pembayaran:</label>  
                <input type="text" name="kode_pembayaran" class="form-control" placeholder="Masukkan Kode Pembayaran" required>  
            </div>  
  
            <button type="submit" class="btn btn-success mt-3">  
                <i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah Pembayaran  
            </button>  
        </form>  
    </div>  
</x-app-layout>  
