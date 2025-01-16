<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_create_bank }}</h4>
        <a href="{{ route('bank.index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List Bank</a>
    </div>
    <form action="{{ route('bank.save') }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf
        <label for="nama_bank" class="form-label">Nama Bank : </label>
        <input type="text" name="nama_bank" id="nama_bank" class="form-control mt-2" autofocus required>
        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah Bank</button>
    </form>
</x-app-layout>