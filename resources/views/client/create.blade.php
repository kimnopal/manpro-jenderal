<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_create_client }}</h4>
        <a href="{{ route('client.index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List Client</a>
    </div>
    <form action="{{ route('client.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf
        <label for="nama_client" class="form-label">Nama Client : </label>
        <input type="text" name="nama_client" id="nama_client" class="form-control mt-2 @error('nama_client') is-invalid @enderror" autofocus >
        @error('nama_client')
            <div class="text-danger fst-italic">{{ 'Nama Client Perlu Diisi' }}</div>
        @enderror
        <label for="alamat_client" class="form-label mt-3">Alamat Client : </label>
        <input type="text" name="alamat_client" id="alamat_client" class="form-control mt-2 @error('alamat_client') is-invalid @enderror" >
        @error('alamat_client')
            <div class="text-danger fst-italic">{{ 'Alamt Client Perlu Diisi' }}</div>
        @enderror
        <label for="kontak_client" class="form-label mt-3">Kontak Client : </label>
        <input type="text" name="kontak_client" id="kontak_client" class="form-control mt-2 @error('kontak_client') is-invalid @enderror" >
        @error('kontak_client')
            <div class="text-danger fst-italic">{{ 'Kontak Client Perlu Diisi' }}</div>
        @enderror
        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah Client</button>
    </form>
</x-app-layout>