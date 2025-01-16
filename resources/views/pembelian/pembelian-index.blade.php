<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_pembelian_index }}</h4>
        <a href="{{ route('pembelian.create-pembelian') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Pembelian</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>Proyek ID</th>
            <th>QTY</th>
            <th>Satuan ID</th>
            <th>Harga Beli</th>
            <th>Supplier ID</th>
            <th>Action</th>
        </thead>
        <tbody class="table-group-divider">
            @php
            $i=1;
            @endphp
            @foreach ($data_pembelian as $pembelian)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $pembelian->proyekid }}</td>
                    <td>{{ $pembelian->qty }}</td>
                    <td>{{ $pembelian->satuanid }}</td>
                    <td>{{ $pembelian->hargabeli }}</td>
                    <td>{{ $pembelian->supplierid }}</td>
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
</x-app-layout>