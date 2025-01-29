<x-app-layout>  
    <div class="mt-3">  
        <h4>Edit Kwitansi</h4>  
        <form id="edit-form" action="{{ route('kwitansi.update', $kwitansi->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25">  
            @csrf  
            @method('PUT')  

            <label for="client_id" class="form-label mt-3">Pilih Client yang bersangkutan</label>
            <select name="client_id" id="client_id" class="form-select mt-2 @error('client_id') is-invalid @enderror">
                <option value="" disabled>Pilih client</option>
                @foreach ($data_client as $client)
                    <option value="{{ $client->id }}" 
                        @if ($kwitansi->client_id == $client->id) selected @endif>
                        {{ $client->nama_client }}
                    </option>
                @endforeach
            </select>
            @error('client_id')
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
