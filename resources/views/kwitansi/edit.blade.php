<x-app-layout>  
    <div class="mt-3">  
        <h4>Edit Kwitansi</h4>  
        <form id="edit-form" action="{{ route('kwitansi.update', $kwitansi->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25">  
            @csrf  
            @method('PUT')  

            <label for="no_kwitansi" class="form-label">No Kwitansi:</label>  
            <input type="text" name="no_kwitansi" class="form-control mb-2 @error('no_kwitansi') is-invalid @enderror" value="{{ $kwitansi->no_kwitansi }}" required>  
            @error('no_kwitansi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="invoice_id" class="form-label mt-3">Pilih invoice yang bersangkutan</label>
            <select name="invoice_id" id="invoice_id" class="form-select mt-2 @error('invoice_id') is-invalid @enderror">
                <option value="" disabled>Pilih invoice</option>
                @foreach ($data_invoice as $invoice)
                    <option value="{{ $invoice->id }}" 
                        @if ($kwitansi->invoice_id == $invoice->id) selected @endif>
                        [{{ $invoice->no_invoice }}] - 
                        {{ $invoice->proyek->client->nama_client }} - 
                        Proyek: {{ $invoice->proyek->no_proyek }}
                    </option>
                @endforeach
            </select>
            @error('invoice_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="total" class="form-label">Total:</label>  
            <input type="number" name="total" class="form-control mb-2 @error('total') is-invalid @enderror" maxlength="10" value="{{ $kwitansi->total }}" required>  
            @error('total')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
  
            <label for="tujuan" class="form-label">Tujuan:</label>  
            <input type="text" name="tujuan" class="form-control mb-2 @error('tujuan') is-invalid @enderror" value="{{ $kwitansi->tujuan }}">  
            @error('tujuan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <label for="tanggal" class="form-label">Tanggal:</label>  
            <input type="date" name="tanggal" class="form-control mb-2 @error('tanggal') is-invalid @enderror" value="{{ $kwitansi->tanggal }}" required>  
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <button class="btn btn-success mt-3" type="submit">  
                <i class="fa-solid fa-save"></i> Simpan Update  
            </button>  
        </form>  
    </div>  

    <!-- Tambahkan JavaScript untuk Deteksi Perubahan -->
    <script>
        let formChanged = false;
        const form = document.getElementById('edit-form');

        // Deteksi perubahan pada input atau select
        form.addEventListener('input', () => {
            formChanged = true;
        });

        // Mencegah pengguna meninggalkan halaman jika ada perubahan
        window.onbeforeunload = function(event) {
            if (formChanged) {
                return "Perubahan belum disimpan. Yakin ingin meninggalkan halaman?";
            }
        };

        // Hapus peringatan saat form dikirim
        form.addEventListener('submit', () => {
            formChanged = false;
        });
    </script>
</x-app-layout>
