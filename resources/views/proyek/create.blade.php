<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_tambah_proyek }}</h4>
        {{-- <a href="{{ route('satuan.index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List Satuan</a> --}}
    </div>
    <form action="{{ route('proyek.simpan') }}" method="POST" class="border-2 mt-3 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf

        <label for="no_proyek" class="form-label">No. Proyek: </label>
        <input type="text" name="no_proyek" id="no_proyek" class="form-control" autofocus required>

        <label for="tgl_mulai_kontrak" class="form-label mt-2">Tanggal mulai kontrak: </label>
        <input type="date" name="tgl_mulai_kontrak" id="tgl_mulai_kontrak" class="form-control" autofocus required>

        <label for="tgl_selesai_kontrak" class="form-label mt-2">Tanggal selesai kontrak: </label>
        <input type="date" name="tgl_selesai_kontrak" id="tgl_selesai_kontrak" class="form-control" autofocus required>

        <label for="klien_id" class="form-label mt-2">Klien ID: </label>
        <input type="text" name="klien_id" id="klien_id" class="form-control" autofocus required>

        <label for="termin" class="form-label mt-2">Termin: </label>
        <input type="date" name="termin" id="termin" class="form-control" autofocus required>

        <label for="biaya" class="form-label mt-2">Biaya: </label>
        <input type="text" name="biaya" id="biaya" class="form-control" autofocus required>

        <label for="pajak" class="form-label mt-2">Pajak: </label>
        <input type="text" name="pajak" id="pajak" class="form-control" autofocus required>

        <label for="biaya_lain" class="form-label mt-2">Biaya lain: </label>
        <input type="text" name="biaya_lain" id="biaya_lain" class="form-control" autofocus required>

        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i>Tambah proyek</button>
    </form>
</x-app-layout>
