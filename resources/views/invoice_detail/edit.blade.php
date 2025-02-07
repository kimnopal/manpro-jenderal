<x-app-layout>  
    <div class="mt-3">  
        <h4>Edit Detail Invoice</h4>  
        <form action="{{ route('invoice_detail.update', $data_invoice->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="invoice_id" value="{{ $data_invoice->id }}">
            <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" required>
                {{ optional($data_invoice->detail)->deskripsi }}
            </textarea>
            <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ optional($data_invoice->detail)->harga }}" required>
            <input type="number" name="qty" id="qty" class="form-control @error('qty') is-invalid @enderror" value="{{ optional($data_invoice->detail)->qty }}" required>
            <button class="btn btn-success mt-3" type="submit">
                <i class="fa-solid fa-save"></i> Simpan Perubahan
            </button>
        </form>
    </div>  
</x-app-layout>  
