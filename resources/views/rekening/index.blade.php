<x-app-layout>
    <div class="d-flex justify-content-center">
        <div class="position-fixed w-75">
            @if (session('flash_message'))
                @php
                    $flashType = session('flash_type');
                    $alertClass = ($flashType === 'delete') ? 'alert-danger' : 
                                  (($flashType === 'save') ? 'alert-info' : 'alert-success');
                @endphp
                <div class="alert {{ $alertClass }} mt-5 fs-4" id="flash-message">
                    {{ session('flash_message') }}
                </div>
                <script>
                    setTimeout(() => {
                        document.getElementById('flash-message').style.display = 'none';
                    }, 1800);
                </script>
            @endif  
        </div>    
    </div>
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_rekening }}</h4>
        <div class="col-6">
            <form action="{{ route('rekening.index') }}" class="d-flex" role="search">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_rekening" placeholder="Cari supplier, bank, atau rekening"  aria-label="Search" autofocus>
                <button class="btn btn-success w-25" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('rekening.create') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Rekening</a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th width="5%">No</th>
            <th>Supplier Pemilik Rekening</th>
            <th>Nama Bank</th>
            <th>Nomor Rekening</th>
            <th width="15%">Aksi</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_rekening as $rekening)
                <tr>
                    <td>{{ $loop->iteration + $data_rekening->firstItem() - 1}}</td>
                    <td>
                        @if ($rekening->supplier_id)
                            {{ $rekening->supplier->nama_supplier }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td>
                    <td>
                        @if ($rekening->bank_id)
                            {{ $rekening->bank->nama_bank }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td>
                    <td>{{ $rekening->nomor_rekening }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('rekening.edit', $rekening->id) }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                        <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#delete_modal_{{ $rekening->id }}"><i class="fa-solid fa-trash"></i> Hapus</button>
                        <div class="modal modal-lg fade" id="delete_modal_{{ $rekening->id }}" tabindex="-1" aria-labelledby="delete_modal_label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete_modal_label">Hapus Rekening</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6>Apakah Anda yakin ingin menghapus rekening ini?</h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <form action="{{ route('rekening.delete', $rekening->id) }}" method="POST">
                                            @method('get')
                                            @csrf
                                            <button type="button" class="btn btn-danger" 
                                                onclick="event.preventDefault(); deleteRecord('{{ route('rekening.delete', $rekening->id) }}');">
                                                Hapus
                                            </button>
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
                {{ $data_rekening->onEachSide(1)->links() }}
<script>
    function deleteRecord(url) {
        Swal.fire({
            title: "Deleted",
            text: "File telah dihapus",
            icon: 'success',
            showConfirmButton: true
        }).then((result) => {
            if(result.isConfirmed || result.dismiss === Swal.DismissReason.backdrop) {
                window.location.href = url;
            }
        })
    };
</script>
</x-app-layout>
