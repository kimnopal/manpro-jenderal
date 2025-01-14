<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_create_item }}</h4>
        <a href="{{ route('item.index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List item</a>
    </div>
    <form action="{{ route('item.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf
        <label for="nama_item" class="form-label">Nama Item : </label>
        <input type="text" name="nama_item" id="nama_item" class="form-control mt-2" autofocus required>
        <label for="satuan_id" class="form-label mt-3">Satuan item : </label>
        <select class="form-select mt-2" aria-label="Default select example" name="satuan_id" id="satuan_id" required>
            <option selected disabled>Pilih Satuan</option>
            <option value="1">Satuan</option>
            <option value="2">Puluhan</option>
            <option value="3">Ratusan</option>
            <option value="4">Ribuan</option>
            <option value="5">Puluh Ribuan</option>
            <option value="6">Ratus Ribuan</option>
            <option value="7">Jutaan</option>
          </select>
        {{-- <input type="text" name="satuan_id" id="satuan_id" class="form-control mt-2" required> --}}
        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah item</button>
    </form>
</x-app-layout>