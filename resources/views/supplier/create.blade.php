<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_create_supplier }}</h4>
        <a href="{{ route('supplier.index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List Supplier</a>
    </div>
    <form action="{{ route('supplier.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf
        <label for="nama_supplier" class="form-label">Nama supplier : </label>
        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control mt-2 @error('nama_supplier') is-invalid @enderror" autofocus >
        @error('nama_supplier')
            <div class="text-danger fst-italic">{{ 'Nama Supplier Perlu Diisi' }}</div>
        @enderror
        <label for="alamat_supplier" class="form-label mt-3">Alamat supplier : </label>
        <input type="text" name="alamat_supplier" id="alamat_supplier" class="form-control mt-2 @error('alamat_supplier') is-invalid @enderror" >
        @error('alamat_supplier')
            <div class="text-danger fst-italic">{{ 'Alamat Supplier Perlu Diisi' }}</div>
        @enderror
        <label for="kontak_supplier" class="form-label mt-3">Kontak supplier : </label>
        <input type="text" name="kontak_supplier" id="kontak_supplier" class="form-control mt-2 @error('kontak_supplier') is-invalid @enderror" >
        @error('kontak_supplier')
            <div class="text-danger fst-italic">{{ 'Kontak Supplier Perlu Diisi' }}</div>
        @enderror
        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah supplier</button>
    </form>
</x-app-layout>