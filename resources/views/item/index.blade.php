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
            <th width="15%">Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_item as $item)
                <tr>
                    <td>{{ $loop->iteration + $data_item->firstItem() - 1 }}</td>
                    <td>{{ $item->nama_item }}</td>
                    <td>
                        @if($item->satuan_id)
                            {{ $item->satuan->nama_satuan }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('item.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('item.delete', $item->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data_item->onEachSide(1)->links() }}
</x-app-layout>