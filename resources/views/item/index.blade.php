<x-app-layout>
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_item }}</h4>
        <div class="col-6">
            <form action="{{ route('item.index') }}" role="search" class="d-flex">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_item" placeholder="Cari nama atau satuan item" autofocus>
                <button class="btn btn-success w-25">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('item.create') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Item</a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th width="5%">No</th>
            <th>Nama Item</th>
            <th>Satuan</th>
            <th width="15%">Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_item as $item)
                <tr>
                    <td class="align-middle">{{ $loop->iteration + $data_item->firstItem() - 1 }}</td>
                    <td class="align-middle">{{ $item->nama_item }}</td>
                    <td>
                            @if($item->satuan)
                                @foreach ($item->satuan as $satuan)
                                    <div>{{ $satuan->nama_satuan }}</div>
                                @endforeach
                            @else
                                Tidak Ada Data
                            @endif
                    </td>
                    <td class="align-middle">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('item.edit', $item->id) }}" class="btn btn-primary btn-sm "><i class="fa-solid fa-circle-info"></i> Detail</a>
                            <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#delete_item_{{ $item->id }}"><i class="fa-solid fa-trash"></i> Hapus</button>
                            <div class="modal modal-lg fade" id="delete_item_{{ $item->id }}" aria-labelledby="delete_bank_label" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5">Hapus Item</h1>
                                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h1 class="fs-6">Apakah Anda yakin ingin menghapus item ini?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                            <form action="{{ route('item.delete', $item->id) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data_item->onEachSide(1)->links() }}
    @if (session('flash_message'))
    @dump(session('flash_message'))
        <script>
            window.addEventListener('load', function () {
                Swal.fire({
                    title   : "{{ session('flash_type') }}",
                    text    : "{{ session('flash_message') }}",
                    icon    : 'success',
                    showConfirmButton : true
                })
            })
        </script>
    @endif
</x-app-layout>