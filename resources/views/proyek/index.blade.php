<x-app-layout>
    <div class="ps-3 border-start vh-100">
        <div class="d-flex justify-content-center py-4">
            <h4>{{ $judul_index_proyek }}</h4>
            <div class="d-flex justify-content-end w-75">
                {{-- <div class="search-wrapper">
                    <div class="search-box d-flex">
                        <i class="fas fa-search search-icon"></i>
                        <input type="text" class="form-control search-input" placeholder="Search anything...">
                        <button class="btn btn-primary search-button">
                                Search
                            </button>
                    </div>
                </div> --}}
                <form action="{{ route('proyek.index') }}" role="search" class="d-flex me-3 w-50">
                    <input type="search" class="form-control me-3 border-2 border-success" name="search_proyek" placeholder="Cari nomor proyek / nama client" autofocus>
                    {{-- <button class="btn btn-success w-25">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button> --}}
                </form>
                <a href="{{ route('proyek.index') }}" class="btn btn-primary me-3" data-placement="bottom" title="Reset search & sort">Reset</a>
                <div class="d-flex">
                    <a href="{{ route('proyek.tambah') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Proyek</a>
                </div>
                {{-- <a href="{{ route('proyek.tambah') }}" class="btn btn-primary" data-placement="bottom" title="Tambah proyek baru"><i class="fa-solid fa-plus"></i></a> --}}
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

        <table class="table table-hover">
            <thead>
                <tr class="text-center">
                    <th>{!! sort_link('no_proyek', 'No. Proyek') !!}</th>
                    <th>{!! sort_link('tgl_mulai_kontrak', 'Mulai Proyek') !!}</th>
                    <th>{!! sort_link('tgl_selesai_kontrak', 'Selesai Proyek') !!}</th>
                    <th>Klien</th>
                    <th>{!! sort_link('termin', 'Termin') !!}</th>
                    <th>{!! sort_link('biaya', 'Biaya') !!}</th>
                    <th>{!! sort_link('pajak', 'Pajak') !!}</th>
                    <th>{!! sort_link('biaya_lain', 'Biaya lain') !!}</th>
                    <th>Menu</th>
                </tr>
            </thead>
            <tbody >
                @foreach($data_proyek as $proyek)
                    <tr class="text-center">
                        <td class="align-middle">{{ $proyek->no_proyek }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proyek->tgl_mulai_kontrak)->format('j M Y') }}</td>
                        <td class="align-middle">{{ \Carbon\Carbon::parse($proyek->tgl_selesai_kontrak)->format('j M Y') }}</td>
                        <td class="align-middle">{{ $proyek->client->nama_client }}</td>
                        <td class="align-middle">{{ $proyek->termin }}</td>
                        <td class="align-middle">Rp.{{ number_format( $proyek->biaya, 2, ',', '.' ) }}</td>
                        <td class="align-middle">Rp.{{ number_format( $proyek->pajak, 2, ',', '.' ) }}</td>
                        <td class="align-middle">Rp.{{ number_format( $proyek->biaya_lain, 2, ',', '.') }}</td>

                        <td>
                            <a href="{{ route('proyek.ubah', $proyek->id) }}" class="btn btn-warning" data-placement="bottom" title="Edit proyek">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                  </svg>
                            </a>
                            <form action="{{ route('proyek.hapus', $proyek->id) }}" method="POST" style="display:inline;">
                                @method('delete')
                                @csrf
                                <a href="{{ route('proyek.hapus', $proyek->id) }}" data-confirm-delete="true">
                                    <button type="submit" class="btn btn-danger" data-placement="bottom" title="Hapus proyek">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </button>
                                </a>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $data_proyek->links() }} --}}
        {{ $data_proyek->appends(['search_proyek' => request('search_proyek')])->links() }}
        @if ($data_proyek->isEmpty())
            <div class="alert alert-warning">
                Data proyek tidak ditemukan
            </div>
        @endif
        @include('sweetalert::alert')
        {{-- @if(session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        title: "Berhasil!",
                        text: "{{ session('success') }}",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                });
            </script>
        @endif --}}
    </div>
</x-app-layout>
