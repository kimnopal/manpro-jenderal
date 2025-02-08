<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_rekening }}</h4>
        <div>
            <a href="{{ route('rekening.index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List Rekening</a>
            <a href="{{ route('rekening.create') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah Rekening</a>
        </div>
    </div>
    <form action="{{ route('rekening.update', $rekening->id) }}" class="border border-2 rounded bg-warning bg-opacity-25 mt-3 p-4" method="POST">
        @method('put')
        @csrf
        <label for="nomor_rekening" class="form-label mt-3" >Nomor Rekening : </label>
        <input type="text" name="nomor_rekening" id="nomor_rekening" class="form-control mt-2 @error('nomor_rekening') is-invalid @enderror " value="{{ $rekening->nomor_rekening }}" autofocus >
        @error('nomor_rekening')
            <div class="text-danger fst-italic">{{ $message }}</div>
        @enderror
        <label for="supplier_id" class="form-label mt-3">Pilih Supplier Pemilik</label>
        <select name="supplier_id" id="supplier_id" class="form-select mt-2 @error('supplier_id') is-invalid @enderror" >
            <option value="{{ $rekening->supplier_id ?? '' }}" selected readonly>
                {{ $rekening->supplier->nama_supplier ?? "Pilih Supplier" }}
            </option>
            @foreach ($data_supplier as $supplier)
                <option value="{{ $supplier->id }}"
                    @if ($rekening->supplier_id == $supplier->id) hidden @endif
                    {{-- @disabled((App\Models\Rekening::where('supplier_id', $supplier->id)->exists()) ?? False) value="{{ $supplier->id }}" --}}
                    >
                    {{ $supplier->nama_supplier }}
                </option>
            @endforeach
        </select>
        @error('supplier_id')
            <div class="text-danger fst-italic">{{ 'Pilih Supplier Rekening' }}</div>
        @enderror
        <label for="bank_id" class="form-label mt-3">Pilih Bank Rekening</label>
        <select name="bank_id" id="bank_id" class="form-select mt-2 @error('bank_id') is-invalid @enderror" >
            <option value="{{ $rekening->bank_id ?? ""}}" selected readonly>
                {{ $rekening->bank->nama_bank ?? "Pilih Bank"}}
            </option>
            @foreach ($data_bank as $bank)
                <option value="{{ $bank->id }}"
                @if ($rekening->bank_id == $bank->id) hidden @endif
                {{-- @disabled(($bank->id == $rekening->bank_id) ?? False) value="{{ $bank->id }}" --}}
                >
                    {{ $bank->nama_bank }}</option>
            @endforeach
        </select>
        @error('bank_id')
            <div class="text-danger fst-italic">{{ 'Pilih Bank Rekening' }}</div>
        @enderror
        <button type="submit" class="btn btn-success mt-3"><i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan</button>
    </form>
    @if (session('save_error'))
        <script>
            window.addEventListener('load', function () {
                Swal.fire({
                    title   : "{{ session('save_error') }}",
                    text    : "{{ session('error_message') }}",
                    icon    : 'error',
                    showConfirmButton : true
                })
            })
        </script>
    @endif
</x-app-layout>