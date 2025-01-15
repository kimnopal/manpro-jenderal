<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_bank }}</h4>
        <div>
            <a href="{{ route('bank.index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List Bank</a>
            <a href="{{ route('bank.create') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah Bank</a>
        </div>
    </div>
    <form action="{{ route('bank.update', $bank->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25">
        @method('put')
        @csrf
        <label for="nama_bank" class="form-label">Nama bank : </label>
        <input type="text" name="nama_bank" id="nama_bank" class="form-control mt-2" autofocus required value="{{ $bank->nama_bank }}">
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>