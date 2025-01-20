<x-app-layout>  
    <div class="mt-3">  
        <h4>Edit Invoice</h4>  
        <form action="{{ route('invoice.update', $invoice->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25">  
            @csrf  
            @method('PUT')  
  
            <label for="no_invoice" class="form-label">No Invoice:</label>  
            <input type="text" name="no_invoice" class="form-control mb-2" value="{{ $invoice->no_invoice }}" required>  
  
            <label for="client" class="form-label">Client:</label>  
            <input type="text" name="client" class="form-control mb-2" value="{{ $invoice->client }}" required>  
  
            <label for="tanggal" class="form-label">Tanggal:</label>  
            <input type="date" name="tanggal" class="form-control mb-2" value="{{ $invoice->tanggal }}" required>  
  
            <label for="catatan" class="form-label">Catatan:</label>  
            <input type="text" name="catatan" class="form-control mb-2" value="{{ $invoice->catatan }}">  
  
            <button class="btn btn-success mt-3" type="submit">  
                <i class="fa-solid fa-save"></i> Simpan Perubahan  
            </button>  
        </form>  
    </div>  
</x-app-layout>  
