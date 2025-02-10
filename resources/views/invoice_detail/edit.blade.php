<x-app-layout>
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Detail Invoice</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('invoice_detail.update', $detail->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="invoice_id" value="{{ $detail->no_invoice }}">

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required>{{ trim($detail->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $detail->harga }}" required>
                        @error('harga')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="qty" class="form-label">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ $detail->qty }}" required>
                        @error('qty')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-success" type="submit">
                            <i class="fa-solid fa-save"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
