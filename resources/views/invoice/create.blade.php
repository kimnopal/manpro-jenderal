<x-app-layout>
    <div class="container mt-3">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Invoice</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('invoice.save') }}" method="POST" class="needs-validation" novalidate>
                    @method('post')
                    @csrf

                    <!-- No Invoice -->
                    <div class="mb-3">
                        <label for="no_invoice" class="form-label">No Invoice:</label>
                        <input type="text" name="no_invoice" id="no_invoice" class="form-control @error('no_invoice') is-invalid @enderror" maxlength="3" pattern="\d{3}" title="Harap masukkan tepat 3 angka." required>
                        @error('no_invoice')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Client -->
                    <div class="mb-3">
                        <label for="client_id" class="form-label">Client:</label>
                        <select name="client_id" id="client_id" class="form-select @error('client_id') is-invalid @enderror" required>
                            <option value="" selected disabled>Pilih Client yang bersangkutan</option>
                            @foreach ($data_client as $client)
                                <option value="{{ $client->id }}">{{ $client->nama_client }}</option>
                            @endforeach
                        </select>
                        @error('client_id')
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

                    <!-- Catatan -->
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan:</label>
                        <input type="text" name="catatan" class="form-control @error('catatan') is-invalid @enderror">
                        @error('catatan')
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