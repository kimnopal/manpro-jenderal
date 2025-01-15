<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_bank }}</h4>
        <a href="{{ route('bank.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Bank</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>Nama Bank</th>
            <th>Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_bank as $no => $bank)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $bank->nama_bank }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('bank.edit', $bank->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('bank.delete', $bank->id) }}" method="POST" class="m-auto">
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