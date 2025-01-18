<x-app-layout>
    <div class="d-flex justify-content-between mt-3">
        <h4>{{ $judul_index_proyek }}</h4>
        <a href="{{ route('proyek.tambah') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Tambah proyek</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
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
                    <td>{{ $proyek['no_proyek'] }}</td>
                    <td>{{ $proyek['tgl_mulai_kontrak'] }}</td>
                    <td>{{ $proyek['tgl_selesai_kontrak'] }}</td>
                    <td>{{ $proyek['klien_id'] }}</td>
                    <td>{{ $proyek['termin'] }}</td>
                    <td>Rp.{{ number_format( $proyek['biaya'], 2, ',', '.' ) }}</td>
                    <td>Rp.{{ number_format( $proyek['pajak'], 2, ',', '.' ) }}</td>
                    <td>Rp.{{ number_format( $proyek['biaya_lain'], 2, ',', '.') }}</td>

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
    </table>
    {{-- {{ $data_rekening->links() }} --}}
</x-app-layout>
