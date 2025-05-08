<x-app-layout>  
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Termin Pembayaran</h4>
                    <small>Invoice: {{ $invoice->invoice_id }} </small>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pembayaran.save', $invoice->id) }}">
                        @csrf
                        <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">

                        <div class="mb-3">
                            <label for="termin_ke" class="form-label">Termin ke-</label>
                            <input type="number" class="form-control" id="termin_no" name="termin_no" 
                                   min="1" required>
                        </div>

                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control" id="nominal" name="nominal" 
                                       min="0" step="0.01" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                                <option value="pending">Pending</option>
                            </select>
                        </div>

                        <div class="mb-3">  
                            <label for="kode_pembayaran" class="form-label">Kode Pembayaran:</label>  
                            <input type="text" name="kode_pembayaran" class="form-control" placeholder="Masukkan Kode Pembayaran" required>  
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success">
                                <i class="fa-solid fa-plus"></i> Simpan Termin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>  
