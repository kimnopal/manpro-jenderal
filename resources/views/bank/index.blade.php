<x-app-layout>
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_bank }}</h4>
        <div class="col-6">
            <form action="{{ route('bank.index') }}" role="search" class="d-flex">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_bank" placeholder="Cari nama bank" autofocus>
                <button class="btn btn-success w-25" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('bank.create') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Bank</a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th width="5%">No</th>
            <th>Nama Bank</th>
            <th width="15%">Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_bank as $bank)
                <tr>
                    <td>{{ $loop->iteration + $data_bank->firstItem() - 1 }}</td>
                    <td>{{ $bank->nama_bank }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('bank.edit', $bank->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#delete_bank_{{ $bank->id }}"><i class="fa-solid fa-trash"></i> Hapus</button>
                        <div class="modal modal-lg fade" id="delete_bank_{{ $bank->id }}" aria-labelledby="delete_bank_laberl" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete_bank_label">Hapus Bank</h1>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="fs-6">Apakah Anda yakin ingin menghapus bank ini?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                        <form action="{{ route('bank.delete', $bank->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger" type="submit">Hapus</button>
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
    {{ $data_bank->onEachSide(1)->links() }}
    
</x-app-layout>