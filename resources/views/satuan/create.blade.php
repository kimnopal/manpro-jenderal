<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_create_satuan }}</h4>
        <a href="{{ route('satuan.index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List Satuan</a>
    </div>
    <form action="{{ route('satuan.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf
        <label for="nama_satuan" class="form-label">Nama Satuan : </label>
        <input type="text" name="nama_satuan" id="nama_satuan" class="form-control mt-2" autofocus required>
        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah Satuan</button>
    </form>
</x-app-layout>