<x-app-layout>  
    <div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_invoice }}</h4>
        <div class="col-6">
            <form action="{{ route('invoice.index') }}" class="d-flex" role="search">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_invoice" placeholder="Cari sesuatu..."  aria-label="Search" autofocus>
                <button class="btn btn-success w-25" type="submit">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('invoice.create-invoice') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Invoice</a>
        </div>  
  
    <table class="table mt-3">  
        <thead>  
            <tr>  
                <th>No.</th>  
                <th>No Invoice</th>  
                <th>Client</th>  
                <th>Tanggal</th>  
                <th>Catatan</th>  
                <th>Aksi</th>  
            </tr>  
        </thead>  
        <tbody>  
            @php
            $i = 1
            @endphp
            @foreach($data_invoice as $invoice)  
                <tr>  
                    <td>{{ $i++ }}</td>  
                    <td>{{ $invoice->no_invoice }}</td>  
                    <td>
                        @if ($invoice->client_id)
                            {{ $invoice->client->nama_client }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td>  
                    <td>{{ $invoice->tanggal }}</td>  
                    <td>{{ $invoice->catatan }}</td>  
                    <td>  
                        <a href="{{ route('invoice.edit-invoice', $invoice->id) }}" class="btn btn-warning">Edit</a>  
                        <form action="{{ route('invoice.delete', $invoice->id) }}" method="GET" style="display:inline;">  
                            @csrf  
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>  
                        </form>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
    {{ $data_invoice->onEachSide(1)->links() }}
</x-app-layout>  
