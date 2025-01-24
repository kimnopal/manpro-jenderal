<x-app-layout>
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_supplier }}</h4>
        <div class="col-6">
            <form action="{{ route('supplier.index') }}" role="search" class="d-flex">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_supplier" placeholder="Cari nama, alamat, atau kontak supplier" autofocus>
                <button class="btn btn-success w-25" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('supplier.create') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Supplier</a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th class="5%">No</th>
            <th>Nama supplier</th>
            <th>Alamat Supplier</th>
            <th>Kontak Supplier</th>
            <th width="15%">Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_supplier as $supplier)
                <tr>
                    <td>{{ $loop->iteration + $data_supplier->firstItem() - 1 }}</td>
                    <td>{{ $supplier->nama_supplier }}</td>
                    <td>{{ $supplier->alamat_supplier }}</td>
                    <td>{{ $supplier->kontak_supplier }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#delete_supplier_{{ $supplier->id }}"><i class="fa-solid fa-trash"></i> Hapus</button> 
                        <div class="modal modal-lg fade" id="delete_supplier_{{ $supplier->id }}" tabindex="-1" aria-labelledby="delete_model_label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="moda-title fs-5" id="delete_modal_label">Hapus Supplier</h1>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="fs-6">Apakah Anda yakin ingin menghapus supplier ini?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                        <form action="{{ route('supplier.delete', $supplier->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data_supplier->onEachSide(1)->links() }}
</x-app-layout>