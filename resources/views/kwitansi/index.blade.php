<x-app-layout>    
<div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_kwitansi }}</h4>
        <div class="col-6">
            <form action="{{ route('kwitansi.index') }}" role="search" class="d-flex">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_kwitansi" placeholder="Cari sesuatu..." autofocus>
                <button class="btn btn-success w-25">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('kwitansi.create-kwitansi') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah kwitansi</a>
        </div>
    

    <table class="table table-bordered table-stripped mt-3">    
        <thead class="table-success">    
            <tr>    
                <th width="5%">No.</th>  
                <th width="12%">Client</th>    
                <th width="15%">Total</th>    
                <th>Tujuan</th>    
                <th width="19%">Tanggal</th>    
                <th width="20%">Aksi</th>    
            </tr>    
        </thead>    
        <tbody class="table-group-divider">    
            @php  
            $i = ($data_kwitansi->currentPage() - 1) * $data_kwitansi->perPage() + 1;
            @endphp  
            @foreach($data_kwitansi as $kwitansi)    
                <tr>  
                    <td>{{ $i++ }}</td>   
                    <td>
                        @if ($kwitansi->client_id)
                            {{ $kwitansi->client->nama_client }}
                        @else
                            Tidak Ada Data
                        @endif
                    </td>    
                    <td>Rp.{{ number_format($kwitansi->total, 2, ',', '.') }}</td>    
                    <td>{{ $kwitansi->tujuan }}</td>    
                    <td>{{ \Carbon\Carbon::parse($kwitansi->tanggal)->translatedFormat('l, j F Y') }}</td>    
                    <td>    
                        <a href="{{ route('kwitansi.edit-kwitansi', $kwitansi->id) }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen"></i> Edit</a>    
                        <form action="{{ route('kwitansi.delete', $kwitansi->id) }}" method="GET" style="display:inline;">    
                            @csrf    
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="fa-solid fa-trash"></i> Hapus</button>    
                        </form>    
                        <a href="{{ route('kwitansi.print', $kwitansi->id) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-print"></i> Print</a>   
                    </td>    
                </tr>    
            @endforeach    
        </tbody>    
    </table>    
    {{ $data_kwitansi->onEachSide(1)->links() }}
</x-app-layout>  
