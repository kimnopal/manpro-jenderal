<x-app-layout>  
    <div class="mt-3">  
        <h4>Tambah Invoice</h4>  
        <form action="{{ route('invoice.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25">  
            @csrf  
            <label for="no_invoice" class="form-label">No Invoice:</label>  
            <input type="text" name="no_invoice" class="form-control mb-2" required>  
  
            <label for="client" class="form-label">Client:</label>  
            <input type="text" name="client" class="form-control mb-2" required>  
  
            <label for="tanggal" class="form-label">Tanggal:</label>  
            <input type="date" name="tanggal" class="form-control mb-2" required>  
  
            <label for="catatan" class="form-label">Catatan:</label>  
            <input type="text" name="catatan" class="form-control mb-2">  
  
            <button class="btn btn-success mt-3" type="submit">  
                <i class="fa-solid fa-save"></i> Simpan  
            </button>  
        </form>  
    </div>  
</x-app-layout>  
