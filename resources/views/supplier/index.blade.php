<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_supplier }}</h4>
        <a href="{{ route('supplier.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Supplier</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>Nama supplier</th>
            <th>Alamat Supplier</th>
            <th>Kontak Supplier</th>
            <th>Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_supplier as $supplier)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->alamat_supplier }}</td>
                    <td>{{ $supplier->kontak_supplier }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('supplier.delete', $supplier->id) }}" method="POST" class="m-auto">
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