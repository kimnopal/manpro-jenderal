<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_pembelian_index }}</h4>
        <div class="d-flex justify-content-end w-75">
            <form action="{{ route('pembelian.pembelian-index') }}" role="search" class="d-flex me-5 w-50">
                @csrf
                <input type="search" class="form-control me-3 border-2 border-success" name="search_pembelian" placeholder="Cari Pembelian" autofocus>
                <button class="btn btn-success w-25">Cari</button>
            </form>
            <a href="{{ route('pembelian.create-pembelian') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Pembelian</a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>No Proyek</th>
            <th>QTY</th>
            <th>Nama Satuan</th>
            <th>Harga Beli</th>
            <th>Nama Supplier</th>
            <th>Action</th>
        </thead>
        <tbody class="table-group-divider">
            @php
            $i=1;
            @endphp
            @foreach ($data_pembelian as $pembelian)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $pembelian->proyek->no_proyek }}</td>
                    <td>{{ $pembelian->qty }}</td>
                    <td>{{ $pembelian->satuan->nama_satuan }}</td>
                    <td>Rp.{{ number_format($pembelian->hargabeli, 2, ',', '.') }}</td>
                    <td>{{ $pembelian->supplier->nama_supplier }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('pembelian.edit-pembelian', $pembelian->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('pembelian.delete', $pembelian->id) }}" method="POST" class="m-auto">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data_pembelian->onEachSide(1)->links() }}
</x-app-layout>