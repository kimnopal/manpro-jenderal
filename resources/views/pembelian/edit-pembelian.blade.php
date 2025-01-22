<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_pembelian }}</h4>
        <div>
            <a href="{{ route('pembelian.pembelian-index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List Pembelian</a>
            <a href="{{ route('pembelian.create-pembelian') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah Pembelian</a>
        </div>
    </div>
    
    <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25">
        @method('put')
        @csrf
        <label for="proyekid" class="form-label mt-3">Proyek ID : </label>
        <select class="form-select mt-2 @error('proyekid') is-invalid @enderror" name="proyekid" id="proyekid" aria-label="Default select example">
            <option value="" disabled selected>Pilih Item</option>
            @foreach ($data_proyek as $proyek)
                <option value="{{ $proyek->id }}" 
                    @selected($proyek->id == $pembelian->proyekid)>
                    {{ $proyek->klien_id }}
                </option>
            @endforeach
        </select>
        @error('satuan_id')
            <div class="text-danger fst-italic">{{ 'Pilih Satuan Item' }}</div>
        @enderror
        
        <label for="qty" class="form-label">Jumlah Barang : </label>
        <input type="text" name="qty" id="qty" class="form-control mt-2" autofocus required value="{{ $pembelian->qty }}">
        
        <label for="satuanid" class="form-label mt-3">Satuan ID : </label>
        <select class="form-select mt-2 @error('satuanid') is-invalid @enderror" name="satuanid" id="satuanid" aria-label="Default select example">
            <option value="" disabled selected>Pilih Item</option>
            @foreach ($data_satuan as $satuan)
                <option value="{{ $satuan->id }}" 
                    @selected($satuan->id == $pembelian->satuanid)>
                    {{ $satuan->nama_satuan }}
                </option>
            @endforeach
        </select>
        @error('satuan_id')
            <div class="text-danger fst-italic">{{ 'Pilih Satuan Item' }}</div>
        @enderror
        
        <label for="satuanid" class="form-label">Satuan ID : </label>
        <input type="text" name="satuanid" id="satuanid" class="form-control mt-2" autofocus required value="{{ $pembelian->satuanid }}">
        
        <label for="supplierid" class="form-label mt-3">Supplier ID : </label>
        <select class="form-select mt-2 @error('supplierid') is-invalid @enderror" name="supplierid" id="supplierid" aria-label="Default select example">
            <option value="" disabled selected>Pilih Supplier</option>
            @foreach ($data_supplier as $supplier)
                <option value="{{ $supplier->id }}" 
                    @selected($supplier->id == $pembelian->proyekid)>
                    {{ $proyek->klien_id }}
                </option>
            @endforeach
        </select>
        @error('satuan_id')
            <div class="text-danger fst-italic">{{ 'Pilih Satuan Item' }}</div>
        @enderror
        
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>