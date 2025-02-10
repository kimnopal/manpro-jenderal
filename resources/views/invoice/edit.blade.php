<x-app-layout>  
    <div class="mt-3">  
        <h4>Edit Invoice</h4>  
        <form action="{{ route('invoice.update', $invoice->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-opacity-25">  
            @csrf  
            @method('PUT')  
  
            <!-- No Invoice -->
            <label for="no_invoice" class="form-label">No Invoice:</label>  
            <input type="text" name="no_invoice" class="form-control mb-2 @error('no_invoice') is-invalid @enderror" value="{{ $invoice->no_invoice }}" required>  
            @error('no_invoice')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
  
            <!-- Pilih Proyek -->
            <label for="proyek_id" class="form-label mt-3">Pilih Proyek yang bersangkutan</label>
            <select name="proyek_id" id="proyek_id" class="form-select mt-2 @error('proyek_id') is-invalid @enderror">
                <option value="" disabled>Pilih Proyek</option>
                @foreach ($data_proyek as $proyek)
                    <option value="{{ $proyek->id }}" 
                        @if (isset($invoice) && $invoice->proyek_id == $proyek->id) selected @endif>
                        {{ $proyek->no_proyek }}
                    </option>
                @endforeach
            </select>
            @error('proyek_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            <!-- Tanggal -->
            <label for="tanggal" class="form-label">Tanggal:</label>  
            <input type="date" name="tanggal" class="form-control mb-2 @error('tanggal') is-invalid @enderror" value="{{ $invoice->tanggal }}" required>  
            @error('tanggal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
  
            <!-- Catatan -->
            <label for="catatan" class="form-label">Catatan:</label>  
            <input type="text" name="catatan" class="form-control mb-2 @error('catatan') is-invalid @enderror" value="{{ $invoice->catatan }}">  
            @error('catatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
  
            <!-- Tombol Simpan -->
            <button class="btn btn-success mt-3" type="submit">  
                <i class="fa-solid fa-save"></i> Simpan Perubahan  
            </button>  
        </form>  
    </div>  
</x-app-layout>