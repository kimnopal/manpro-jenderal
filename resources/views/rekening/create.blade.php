<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_create_rekening }}</h4>
        <a href="{{ route('rekening.index') }}" class="btn btn-primary"><i class="fa-solid fa-list"></i> List Rekening</a>
    </div>
    <form action="{{ route('rekening.save') }}" class="border rounded border-2 bg-success bg-opacity-25 mt-3 p-4" method="POST">
        @method('post')
        @csrf
        <label for="nomor_rekening" class="form-label">Nomor Rekening : </label>
        <input type="text" name="nomor_rekening" id="nomor_rekening" class="form-control mt-2" required>
        <label for="supplier_id" class="form-label mt-3">Pilih Supplier Rekening</label>
        <select name="supplier_id" id="supplier_id" class="form-select mt-2" required>
            <option value="" selected disabled>Pilih Supplier</option>
            @foreach ($data_supplier as $supplier)
                <option value="{{ $supplier->id }}" 
                    {{-- @disabled(optional($supplier->rekening)->supplier_id && $supplier->id == optional($supplier->rekening)->supplier_id)> --}}
                    @disabled(($supplier->rekening) ? ($supplier->rekening->supplier_id==$supplier->id) : False)>
                    {{ $supplier->nama_supplier }}
                </option>
            @endforeach
        </select>
        <label for="bank_id" class="form-label mt-3">Pilih Bank Rekening</label>
        <select name="bank_id" id="bank_id" class="form-select mt-2" required>
            <option value="" selected disabled>Pilih Bank</option>
            @foreach ($data_bank as $bank)
                <option value="{{ $bank->id }}">{{ $bank->nama_bank }}</option>
                @endforeach
            </select>
            <button class="btn btn-success mt-3"><i class="fa-solid fa-arrow-up-from-bracket"></i> Tambah Rekening</button>
        </form>
    </x-app-layout>
