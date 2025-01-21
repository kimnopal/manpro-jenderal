<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_create_pembelian }}</h4>
        <a href="{{ route('pembelian.pembelian-index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List Pembelian</a>
    </div>
    <form action="{{ route('pembelian.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf
        <label for="proyekid" class="form-label">Proyek ID : </label>
        <input type="text" name="proyekid" id="proyekid" class="form-control mt-2" @error()>

        <label for="qty" class="form-label">Jumlah Barang : </label>
        <input type="text" name="qty" id="qty" class="form-control mt-2" autofocus required>

        <label for="satuanid" class="form-label">Satuan ID : </label>
        <select class="form-select mt-2 @error('satuanid') is-invalid @enderror" aria-label="Default select example" name="satuanid" id="satuanid" >
            <option value="" selected disabled>Pilih Satuan</option>
            @foreach ($data_satuan as $satuan)
                <option value="{{ $satuan->id }}">{{ $satuan->nama_satuan }}</option>
            @endforeach
        </select>
        @error('satuan_id')
            <div class="text-danger fst-italic">{{ 'Pilih Satuan Item' }}</div>
        @enderror

        <label for="hargabeli" class="form-label">Harga Beli : </label>
        <input type="text" name="hargabeli" id="hargabeli" class="form-control mt-2" autofocus required>

        <label for="supplierid" class="form-label">Supplier ID : </label>
        <input type="text" name="supplierid" id="supplierid" class="form-control mt-2" autofocus required>
        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah Satuan</button>
    </form>
</x-app-layout>