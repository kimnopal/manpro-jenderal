<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_proyek }}</h4>
        <div class="d-flex justify-content-end w-75">
            <form action="{{ route('proyek.index') }}" role="search" class="d-flex me-5 w-50">
                <input type="search" class="form-control me-3 border-2 border-success" name="search_proyek" placeholder="Cari nomor proyek" autofocus>
                <button class="btn btn-success w-25">Cari</button>
            </form>
            <a href="{{ route('proyek.tambah') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah proyek</a>
        </div>
    </div>

    {{-- <table class="table table-bordered table-striped mt-3">
        <thead class="table-success">
            <th>No. Proyek</th>
            <th>Mulai Proyek</th>
            <th>Selesai Proyek</th>
            <th>Klien ID</th>
            <th>Termin</th>
            <th>Biaya</th>
            <th>Pajak</th>
            <th>Biaya lain</th>
            <th width="15%">Aksi</th>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data_proyek as $proyek)
                <tr>
                    <td>{{ $proyek->no_proyek }}/JSD/I/2025</td>
                    <td>{{ \Carbon\Carbon::parse($proyek->tgl_mulai_kontrak)->format('j M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($proyek->tgl_selesai_kontrak)->format('j M Y') }}</td>
                    <td>{{ $proyek->klien_id }}</td>
                    <td>{{ \Carbon\Carbon::parse($proyek->termin)->format('j M Y') }}</td>
                    <td>Rp.{{ number_format( $proyek->biaya, 2, ',', '.' ) }}</td>
                    <td>Rp.{{ number_format( $proyek->pajak, 2, ',', '.' ) }}</td>
                    <td>Rp.{{ number_format( $proyek->biaya_lain, 2, ',', '.') }}</td>

                    <td class="d-flex justify-content-between">
                        <a href="{{ route('proyek.ubah', $proyek['id']) }}" class="btn btn-warning btn-sm"><i class="fa-regular fa-pen-to-square"></i> Edit</a>
                        <form action="{{ route('proyek.hapus', $proyek['id']) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin?')" type="submit"><i class="fa-solid fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}

    <table class="table mt-3">
        <thead>
            <tr class="text-center">
                <th>No. Proyek</th>
                <th>Mulai Proyek</th>
                <th>Selesai Proyek</th>
                <th>Klien ID</th>
                <th>Termin</th>
                <th>Biaya</th>
                <th>Pajak</th>
                <th>Biaya lain</th>
                <th width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data_proyek as $proyek)
                <tr class="text-center">
                    <td>{{ $proyek->no_proyek }}/JSD/I/2025</td>
                    <td>{{ \Carbon\Carbon::parse($proyek->tgl_mulai_kontrak)->format('j M Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($proyek->tgl_selesai_kontrak)->format('j M Y') }}</td>
                    <td>{{ $proyek->client->id }}</td>
                    <td>{{ \Carbon\Carbon::parse($proyek->termin)->format('j M Y') }}</td>
                    <td>Rp.{{ number_format( $proyek->biaya, 2, ',', '.' ) }}</td>
                    <td>Rp.{{ number_format( $proyek->pajak, 2, ',', '.' ) }}</td>
                    <td>Rp.{{ number_format( $proyek->biaya_lain, 2, ',', '.') }}</td>

                    <td>
                        <a href="{{ route('proyek.ubah', $proyek->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('proyek.hapus', $proyek->id) }}" method="POST" style="display:inline;">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data_proyek->onEachSide(1)->links() }}
</x-app-layout>
