<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_satuan }}</h4>
        <a href="{{ route('satuan.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Satuan</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>Nama Satuan</th>
            <th width="15%">Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_satuan as $satuan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $satuan->nama_satuan }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('satuan.edit', $satuan->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('satuan.delete', $satuan->id) }}" method="POST">
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