<x-app-layout>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Kwitansi</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('kwitansi.save') }}" method="POST" class="needs-validation" novalidate>
                    @method('post')
                    @csrf

                    <div class="mb-3">
                        <label for="no_kwitansi" class="form-label">No kwitansi:</label>
                        <input type="text" name="no_kwitansi" id="no_kwitansi" class="form-control @error('no_kwitansi') is-invalid @enderror" maxlength="3" pattern="\d{3}" title="Harap masukkan tepat 3 angka." required>
                        @error('no_kwitansi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="invoice_id" class="form-label">Pilih Invoice:</label>
                        <select name="invoice_id" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Invoice --</option>
                            @foreach($data_invoice as $invoice)
                                <option value="{{ $invoice->id }}">
                                    [{{ $invoice->no_invoice }}] - 
                                    {{ $invoice->proyek->client->nama_client }} - 
                                    Proyek: {{ $invoice->proyek->no_proyek }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Total -->
                    <div class="mb-3">
                        <label for="total" class="form-label">Total:</label>
                        <input type="number" name="total" class="form-control @error('total') is-invalid @enderror" maxlength="10" required>
                        @error('total')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- tujuan -->
                    <div class="mb-3">
                        <label for="tujuan" class="form-label">Tujuan:</label>
                        <input type="text" name="tujuan" class="form-control @error('tujuan') is-invalid @enderror">
                        @error('tujuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal -->
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal:</label>
                        <input type="date" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror" required>
                        @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tombol Simpan -->
                    <div class="d-grid">
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-save"></i> Simpan
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>