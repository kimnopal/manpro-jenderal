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