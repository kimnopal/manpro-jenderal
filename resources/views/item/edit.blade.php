<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_item }}</h4>
        <div>
            <a href="{{ route('item.index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List item</a>
            <a href="{{ route('item.create') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah item</a>
        </div>
    </div>
    <form action="{{ route('item.update', $item->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25">
        @method('put')
        @csrf
        <label for="nama_item" class="form-label">Nama Item : </label>
        <input type="text" name="nama_item" id="nama_item" class="form-control mt-2" autofocus required value="{{ $item->nama_item }}">
        <label for="satuan_id" class="form-label mt-3">Satuan Item : </label>
        <select class="form-select mt-2" name="satuan_id" id="satuan_id" aria-label="Default select example" required>
            <option selected disabled>{{ $item->satuan->nama_satuan ?? "Pilih Satuan"}}</option>
            <option value="1">Satuan</option>
            <option value="2">Puluhan</option>
            <option value="3">Ratusan</option>
            <option value="4">Ribuan</option>
            <option value="5">Puluh Ribuan</option>
            <option value="6">Ratus Ribuan</option>
            <option value="7">Jutaan</option>
        </select>
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>