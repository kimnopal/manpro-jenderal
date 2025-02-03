<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_ubah_proyek }}</h4>
    </div>
    <form action="{{ route('proyek.update', $proyek['id']) }}" method="POST" class="border-2 mt-3 rounded p-4 bg-info bg-gradient bg-opacity-25">
        @method('post')
        @csrf

        <label for="no_proyek" class="form-label">No. Proyek: </label>
        <input type="text" name="no_proyek" id="no_proyek" class="form-control" value="{{ $proyek['no_proyek'] }}" autofocus required>

        <label for="tgl_mulai_kontrak" class="form-label mt-2">Tanggal mulai kontrak: </label>
        <input type="date" name="tgl_mulai_kontrak" id="tgl_mulai_kontrak" class="form-control" value="{{ $proyek['tgl_mulai_kontrak'] }}" autofocus required>

        <label for="tgl_selesai_kontrak" class="form-label mt-2">Tanggal selesai kontrak: </label>
        <input type="date" name="tgl_selesai_kontrak" id="tgl_selesai_kontrak" class="form-control" value="{{ $proyek['tgl_selesai_kontrak'] }}" autofocus required>

        <label for="klien_id" class="form-label mt-2">Nama client: </label>
        {{-- <input type="text" name="klien_id" id="klien_id" class="form-control" value="{{ $proyek['klien_id'] }}" autofocus required> --}}

        <select name="klien_id" id="klien_id" class="form-select mt-2" >
            <option value="{{ $proyek->klien_id ?? '' }}" selected readonly>
                {{ $proyek->client->nama_client ?? "Pilih Client" }}
            </option>
            @foreach ($data_klien as $klien)
                <option value="{{ $klien->id }}"
                    @if ($proyek->klien_id == $klien->id) hidden @endif
                    {{-- @disabled((App\Models\Rekening::where('supplier_id', $supplier->id)->exists()) ?? False) value="{{ $supplier->id }}" --}}
                    >
                    {{ $klien->nama_client }}
                </option>
            @endforeach
        </select>

        <label for="termin" class="form-label mt-2">Termin: </label>
        <input type="text" name="termin" id="termin" class="form-control" value="{{ $proyek['termin'] }}" autofocus required>

        <label for="biaya" class="form-label mt-2">Biaya: </label>
        <input type="text" name="biaya" id="biaya" class="form-control" value="{{ $proyek['biaya'] }}" autofocus required>

        <label for="pajak" class="form-label mt-2">Pajak: </label>
        <input type="text" name="pajak" id="pajak" class="form-control" value="{{ $proyek['pajak'] }}" autofocus required>

        <label for="biaya_lain" class="form-label mt-2">Biaya lain: </label>
        <input type="text" name="biaya_lain" id="biaya_lain" class="form-control" value="{{ $proyek['biaya_lain'] }}" autofocus required>

        <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i>Update proyek</button>
    </form>
</x-app-layout>
