<x-app-layout>
    <div class="container">
        <div class="d-flex justify-content-between mt-3">
            <h4>{{ $judul_edit_item }}</h4>
            <div>
                <a href="{{ route('item.index') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-list"></i> List item</a>
                <a href="{{ route('item.create') }}" class="btn btn-primary mx-2"><i class="fa-solid fa-plus"></i> Tambah item</a>
            </div>
        </div>
        <div class="mt-3 row">
            <form action="{{ route('item.update', $item->id) }}" method="POST" class="border border-2 rounded p-4 bg-warning bg-gradient bg-opacity-25 col-7">
                @method('put')
                @csrf
                <label for="nama_item" class="form-label">Nama Item : </label>
                <input type="text" name="nama_item" id="nama_item" class="form-control @error('nama_item') is-invalid @enderror " autofocus value="{{ $item->nama_item }}">
                @error('nama_item')
                    <div class="text-danger fst-italic">{{ 'Nama Item Perlu Diisi' }}</div>
                @enderror
                <button type="submit" class="btn btn-success mt-2"><i class="fa-solid fa-save"></i> Simpan Perubahan</button>
            </form>
            <div class="col-5">
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <th width="10%">No</th>
                        <th>Satuan</th>
                        <th class="w-25">Action</th>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($item->satuan as $satuan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $satuan->nama_satuan }}</td>
                                <td>
                                    <button class="btn btn-danger btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#delete_satuan_{{ $satuan->id }}"><i class="fa-solid fa-trash"></i> Hapus</button>
                                    <div id="delete_satuan_{{ $satuan->id }}" class="modal fade modal-lg" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5">Hapus Satuan</h1>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h1 class="fs-6">Apakah Anda yakin ingin menghapus satuan ini dari item {{ $item->nama_item }}?</h1>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                                    <form action="{{ route('itemsatuan.delete', [$item->id ,$satuan->id] ) }}" method="POST">
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
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambah_satuan" ><i class="fa-solid fa-plus"></i> Tambah Data Satuan Item</button>
                <div class="modal modal-lg fade" id="tambah_satuan" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5">Tambah Data Satuan Item</h1>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('itemsatuan.edit', $item->id) }}" method="POST">
                                    @method('post')
                                    @csrf
                                    <label for="tambah_satuan_item" class="form-label">Pilih Satuan</label>
                                    <select name="tambah_satuan_item" id="tambah_satuan_item" class="form-select">
                                        <option value="" selected readonly>Pilih Satuan</option>
                                        @foreach ($data_satuan as $satuan)
                                            <option value="{{ $satuan->id }}"
                                                @foreach ($item->satuan as $itemsatuan)
                                                    @if ($satuan->id == $itemsatuan->pivot->satuan_id) hidden @endif
                                                @endforeach>
                                                {{ $satuan->nama_satuan }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button class="btn btn-success mt-3" type="submit"><i class="fa-solid fa-save"></i> Tambah Satuan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>

    
</x-app-layout>