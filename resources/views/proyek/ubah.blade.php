<x-app-layout>
    <div class="container border border-success-subtle my-5 rounded-4">
        <div class="mx-3 mt-4">
            <h4>{{ $judul_ubah_proyek }}</h4>
        </div>
        <form action="{{ route('proyek.update', $proyek['id']) }}" method="POST" class="mb-3 rounded p-3 grid row-gap-4 row row-cols-2">
            @method('post')
            @csrf

            <div class="col">
                <label for="no_proyek" class="form-label">No. Proyek: </label>
                <input type="text" name="no_proyek" id="no_proyek" class="form-control border-success-subtle border border-success-subtle" value="{{ $proyek['no_proyek'] }}" autofocus>
                @error('no_proyek')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>

            <div class="col">
                <label for="tgl_mulai_kontrak" class="form-label">Tanggal mulai kontrak: </label>
                <input type="date" name="tgl_mulai_kontrak" id="tgl_mulai_kontrak" class="form-control border border-success-subtle" value="{{ $proyek['tgl_mulai_kontrak'] }}" autofocus>
                @error('tgl_mulai_kontrak')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>

            <div class="col">
                <label for="klien_id" class="form-label">Nama client: </label>
                <select name="klien_id" id="klien_id" class="form-select border border-success-subtle">
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
            </div>

            <div class="col">
                <label for="tgl_selesai_kontrak" class="form-label">Tanggal selesai kontrak: </label>
                <input type="date" name="tgl_selesai_kontrak" id="tgl_selesai_kontrak" class="form-control border border-success-subtle" value="{{ $proyek['tgl_selesai_kontrak'] }}" autofocus>
                @error('tgl_selesai_kontrak')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>

            <div class="col">
                <label for="termin" class="form-label">Termin: </label>
                <input type="text" name="termin" id="termin" class="form-control border border-success-subtle" value="{{ $proyek['termin'] }}" autofocus>
                @error('termin')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>

            <div class="col">
                <label for="biaya" class="form-label">Biaya: </label>
                <input type="text" name="biaya" id="biaya" class="form-control border border-success-subtle" value="{{ $proyek['biaya'] }}" autofocus>
                @error('biaya')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>

            <div class="col">
                <label for="pajak" class="form-label">Pajak: </label>
                <input type="text" name="pajak" id="pajak" class="form-control border border-success-subtle" value="{{ $proyek['pajak'] }}" autofocus>
                @error('pajak')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>

            <div class="col">
                <label for="biaya_lain" class="form-label">Biaya lain: </label>
                <input type="text" name="biaya_lain" id="biaya_lain" class="form-control border border-success-subtle" value="{{ $proyek['biaya_lain'] }}" autofocus>
                @error('biaya_lain')
                    <small class="text-danger">{{ $message }}</small><br>
                @enderror
            </div>

            <div class="col">
                <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Update proyek</button>
            </div>
        </form>
    </div>
</x-app-layout>
