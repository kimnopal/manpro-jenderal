<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_item }}</h4>
        <a href="{{ route('item.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Item</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>Nama Item</th>
            <th>Satuan</th>
            <th>Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_item as $no => $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_item }}</td>
                    <td>
                        @if($item->satuan_id)
                            {{ $item->satuan->nama_satuan }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('item.delete', $item->id) }}" method="POST" class="m-auto">
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