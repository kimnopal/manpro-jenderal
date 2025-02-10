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
        <input type="text" name="nama_bank" id="nama_bank" class="form-control mt-2 @error('nama_bank') is-invalid @enderror " autofocus value="{{ $bank->nama_bank }}">
        @error('nama_bank')
            <div class="text-danger fst-italic fs-6">{{ 'Nama Bank Perlu Diisi' }}</div>
        @enderror
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
    @if (session('update_error'))
        <script>
            window.addEventListener('load', function () {
                Swal.fire({
                    title   : "{{ session('update_error') }}",
                    text    : "{{ session('error_message') }}",
                    icon    : 'error',
                    showConfirmButton : true
                })
            })
        </script>
    @endif
</x-app-layout>