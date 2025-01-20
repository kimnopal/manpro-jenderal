<x-app-layout>  
    <div class="mt-3">  
        <h4>Edit Kwitansi</h4>  
        <form action="{{ route('kwitansi.update', $kwitansi->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25">  
            @csrf  
            @method('PUT')  
  
            <label for="client" class="form-label">Client:</label>  
            <input type="text" name="client" class="form-control mb-2" value="{{ $kwitansi->client }}" required>  
  
            <label for="total" class="form-label">Total:</label>  
            <input type="number" name="total" class="form-control mb-2" value="{{ $kwitansi->total }}" required>  
  
            <label for="tujuan" class="form-label">Tujuan:</label>  
            <input type="text" name="tujuan" class="form-control mb-2" value="{{ $kwitansi->tujuan }}" required>  
  
            <label for="tanggal" class="form-label">Tanggal:</label>  
            <input type="date" name="tanggal" class="form-control mb-2" value="{{ $kwitansi->tanggal }}" required>  
  
            <button class="btn btn-success mt-3" type="submit">  
                <i class="fa-solid fa-save"></i> Simpan Update  
            </button>  
        </form>  
    </div>  
</x-app-layout>  
