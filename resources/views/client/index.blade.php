<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_client }}</h4>
        <a href="{{ route('client.create') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Tambah Client</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No</th>
            <th>Nama client</th>
            <th>Alamat client</th>
            <th>Kontak client</th>
            <th>Action</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_client as $no => $client)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $client->nama_client }}</td>
                    <td>{{ $client->alamat_client }}</td>
                    <td>{{ $client->kontak_client }}</td>
                    <td class="d-flex flex-row">
                        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit"></i> Edit</a>
                        <form action="{{ route('client.delete', $client->id) }}" method="POST" class="m-auto">
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