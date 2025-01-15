<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_client }}</h4>
        <div>
            <a href="{{ route('client.index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List Client</a>
            <a href="{{ route('client.create') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah Client</a>
        </div>
    </div>
    <form action="{{ route('client.update', $client->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25">
        @method('put')
        @csrf
        <label for="nama_client" class="form-label">Nama Client : </label>
        <input type="text" name="nama_client" id="nama_client" class="form-control mt-2" autofocus required value="{{ $client->nama_client }}">
        <label for="alamat_client" class="form-label mt-3">Alamat Client : </label>
        <input type="text" name="alamat_client" id="alamat_client" class="form-control mt-2" required value="{{ $client->alamat_client }}">
        <label for="kontak_client" class="form-label mt-3">Kontak Client : </label>
        <input type="text" name="kontak_client" id="kontak_client" class="form-control mt-2" required value="{{ $client->kontak_client }}">
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>