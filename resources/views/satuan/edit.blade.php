<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_satuan }}</h4>
        <div>
            <a href="{{ route('satuan.index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List Satuan</a>
            <a href="{{ route('satuan.create') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah Satuan</a>
        </div>
    </div>
    <form action="{{ route('satuan.update', $satuan->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25">
        @method('put')
        @csrf
        <label for="nama_satuan" class="form-label">Nama Satuan : </label>
        <input type="text" name="nama_satuan" id="nama_satuan" class="form-control mt-2 @error('nama_satuan') is-invalid @enderror " autofocus value="{{ $satuan->nama_satuan }}">
        @error('nama_satuan')
            <div class="text-danger fst-italic">{{ 'Nama Satuan Perlu Diisi' }}</div>
        @enderror
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>