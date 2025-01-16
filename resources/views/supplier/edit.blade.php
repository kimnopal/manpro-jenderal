<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_supplier }}</h4>
        <div>
            <a href="{{ route('supplier.index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List Supplier</a>
            <a href="{{ route('supplier.create') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah Supplier</a>
        </div>
    </div>
    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25">
        @method('put')
        @csrf
        <label for="nama_supplier" class="form-label">Nama supplier : </label>
        <input type="text" name="nama_supplier" id="nama_supplier" class="form-control mt-2" autofocus required value="{{ $supplier->nama_supplier }}">
        <label for="alamat_supplier" class="form-label mt-3">Alamat supplier : </label>
        <input type="text" name="alamat_supplier" id="alamat_supplier" class="form-control mt-2" required value="{{ $supplier->alamat_supplier }}">
        <label for="kontak_supplier" class="form-label mt-3">Kontak supplier : </label>
        <input type="text" name="kontak_supplier" id="kontak_supplier" class="form-control mt-2" required value="{{ $supplier->kontak_supplier }}">
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>