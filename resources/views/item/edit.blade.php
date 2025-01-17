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
        <input type="text" name="nama_item" id="nama_item" class="form-control mt-2 @error('nama_item') is-invalid @enderror " autofocus value="{{ $item->nama_item }}">
        @error('nama_item')
            <div class="text-danger fst-italic">{{ 'Nama Item Perlu Diisi' }}</div>
        @enderror
        <label for="satuan_id" class="form-label mt-3">Satuan Item : </label>
        <select class="form-select mt-2 @error('satuan_id') is-invalid @enderror" name="satuan_id" id="satuan_id" aria-label="Default select example">
            <option value="" disabled selected>Pilih Item</option>
            @foreach ($data_satuan as $satuan)
                <option value="{{ $satuan->id }}" 
                    @selected($satuan->id == $item->satuan_id)>
                    {{ $satuan->nama_satuan }}
                </option>
            @endforeach
        </select>
        @error('satuan_id')
            <div class="text-danger fst-italic">{{ 'Pilih Satuan Item' }}</div>
        @enderror
        <button type="submit" class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>