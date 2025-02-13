<x-app-layout>
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_client }}</h4>
        <div class="col-6">
            <form action="{{ route('client.index') }}" role="search" class="d-flex">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_client" placeholder="Cari nama, alamat, atau kontak client" autofocus>
                <button class="btn btn-success w-25" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('client.create') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Client</a>
        </div>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th width="5%">No</th>
            <th>Nama client</th>
            <th>Alamat client</th>
            <th>Kontak client</th>
            <th width="15%">Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_client as $client)
                <tr>
                    <td>{{ $loop->iteration + $data_client->firstItem() - 1 }}</td>
                    <td>{{ $client->nama_client }}</td>
                    <td>{{ $client->alamat_client }}</td>
                    <td>{{ $client->kontak_client }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#delete_client_{{ $client->id }}"><i class="fa-solid fa-trash"></i> Hapus</button>
                        <div class="modal modal-lg fade" id="delete_client_{{ $client->id }}" aria-labelledby="delete_client_{{ $client->id }}_label" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="delete_client_{{ $client->id }}_label">Hapus Client</h1>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 class="fs-6">Apakah Anda yakin ingin menghapus client ini?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                        <form action="{{ route('client.delete', $client->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger">Hapus</button>
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
    {{ $data_client->onEachSide(1)->links() }}
    @if (session('flash_message'))
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