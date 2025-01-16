<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_rekening }}</h4>
        <a href="{{ route('rekening.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Rekening</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>Supplier Pemilik Rekening</th>
            <th>Nama Bank</th>
            <th>Nomor Rekening</th>
            <th width="15%">Aksi</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_rekening as $rekening)
                <tr>
                    <td>{{ $loop->iteration }}</td>
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
                        <form action="{{ route('rekening.delete', $rekening->id) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')" type="submit"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data_rekening->links() }}
</x-app-layout>