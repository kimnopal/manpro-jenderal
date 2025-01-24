<x-app-layout>
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_satuan }}</h4>
        <div class="col-6">
            <form action="{{ route('satuan.index') }}" role="search" class="d-flex">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_satuan" placeholder="Cari nama satuan" autofocus>
                <button class="btn btn-success w-25">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('satuan.create') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Satuan</a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th width="5%">No</th>
            <th>Nama Satuan</th>
            <th width="15%">Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_satuan as $satuan)
                <tr>
                    <td>{{ $loop->iteration + $data_satuan->firstItem() - 1 }}</td>
                    <td>{{ $satuan->nama_satuan }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('satuan.edit', $satuan->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#delete_satuan_{{ $satuan->id }}"><i class="fa-solid fa-trash"></i> Hapus</button>
                        <div class="modal modal-lg fade" id="delete_satuan_{{ $satuan->id }}" aria-labelledby="delete_satuan_{{ $satuan->id }}_label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete_satuan_{{ $satuan->id }}_label">Hapus Satuan</h1>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="fs-6">Apakah Anda yakin ingin menghapus satuan ini?</h1>
                                    </div>
                                    <dif class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                        <form action="{{ route('satuan.delete', $satuan->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </form>
                                    </dif>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data_satuan->onEachSide(1)->links() }}
    
</x-app-layout>