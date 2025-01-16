<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_edit_pembelian }}</h4>
        <div>
            <a href="{{ route('pembelian.pembelian-index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List Pembelian</a>
            <a href="{{ route('pembelian.create-pembelian') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah Pembelian</a>
        </div>
    </div>
    <form action="{{ route('pembelian.update', $pembelian->id) }}" method="POST" class="mt-3 border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25">
        @method('put')
        @csrf
        <label for="qty" class="form-label">Jumlah Barang : </label>
        <input type="text" name="qty" id="qty" class="form-control mt-2" autofocus required value="{{ $pembelian->qty }}">
        <label for="satuanid" class="form-label">Satuan ID : </label>
        <input type="text" name="satuanid" id="satuanid" class="form-control mt-2" autofocus required value="{{ $pembelian->satuanid }}">
        <button class="btn btn-success mt-3"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
    </form>
</x-app-layout>