<x-app-layout>  
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_invoice }}</h4>
        <div class="col-6">
            <form action="{{ route('invoice.index') }}" class="d-flex" role="search">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_invoice" value="{{ request('search_invoice') }}" placeholder="Cari sesuatu..."  aria-label="Search" autofocus>
                <button class="btn btn-success w-25" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('invoice.create-invoice') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Invoice</a>
        </div>  
  
    <table class="table table-bordered table-striped mt-3">  
        <thead class="table-success">  
            <tr>  
                <th width="5%">No.</th>  
                <th width="12%">No Invoice</th>  
                <th width="15%">No Proyek</th>
                <th width="15%">Client</th>  
                <th width="19%">Tanggal</th>  
                <th>Catatan</th>  
                <th width="20%">Aksi</th>  
            </tr>  
        </thead>  
        <tbody class="table-group-divider">  
            @php
            $i = $i = ($data_invoice->currentPage() - 1) * $data_invoice->perPage() + 1
            @endphp
            @foreach($data_invoice as $invoice)  
                <tr>  
                    <td>{{ $i++ }}</td>  
                    <td>{{ $invoice->no_invoice }}</td>  
                    <td>
                        @if ($invoice->proyek_id)
                            {{ $invoice->proyek->no_proyek }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td>
                    <td>
                        @if ($invoice->proyek_id)
                            {{ $invoice->proyek->client->nama_client }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td> 
                    <td>{{ \Carbon\Carbon::parse($invoice->tanggal)->translatedFormat('l, j F Y') }}</td>  
                    <td>{{ $invoice->catatan }}</td>  
                    <td>  
                        <a href="{{ route('invoice.edit-invoice', $invoice->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i> Edit</a>  
                        <form action="{{ route('invoice.delete', $invoice->id) }}" method="POST" style="display:inline;">  
                            @method('delete')
                            @csrf  
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i> Hapus</button>  
                        </form>  
                        <a href="{{ route('detail_invoice.index', $invoice->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-circle-info"></i> Detail</a>
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
    {{ $data_invoice->appends(['search_invoice' => request('search_invoice')])->links() }}
</x-app-layout>  
