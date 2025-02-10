<x-app-layout>
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Detail Invoice</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('invoice_detail.save', $invoice->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="qty" class="form-label">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" required>
                        @error('qty')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-plus"></i> Tambah Detail
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
