<x-app-layout>    
<div class="row mt-3">
        <h4 class="col-4">{{ $judul_index_item }}</h4>
        <div class="col-6">
            <form action="{{ route('kwitansi.index') }}" role="search" class="d-flex">
                <input type="search" class="form-control me-2 border-2 border-success" name="search_kwitansi" placeholder="Cari client atau yang lainnya" autofocus>
                <button class="btn btn-success w-25">Cari</button>
            </form>
        </div>
        <div class="col-2 d-flex">
            <a href="{{ route('item.create') }}" class="btn btn-primary ms-auto w-100"><i class="fa-solid fa-plus"></i> Tambah Item</a>
        </div>
    </div>     

    <table class="table table-striped table-bordered mt-3">    
        <thead class="table-light">    
            <tr>    
                <th>No.</th>  
                <th>Client</th>    
                <th>Total</th>    
                <th>Tujuan</th>    
                <th>Tanggal</th>    
                <th>Aksi</th>    
            </tr>    
        </thead>    
        <tbody>    
            @php  
            $i = 1  
            @endphp  
            @foreach($data_kwitansi as $item)    
                <tr>  
                    <td>{{ $i++ }}</td>   
                    <td>{{ $item->client }}</td>    
                    <td>{{ number_format($item->total, 2, ',', '.') }}</td>    
                    <td>{{ $item->tujuan }}</td>    
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, j F Y') }}</td>    
                    <td>    
                        <a href="{{ route('kwitansi.edit-kwitansi', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>    
                        <form action="{{ route('kwitansi.delete', $item->id) }}" method="GET" style="display:inline;">    
                            @csrf    
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>    
                        </form>    
                        <a href="{{ route('kwitansi.print', $item->id) }}" class="btn btn-primary btn-sm">    
                            <i class="fa-solid fa-print"></i> Print    
                        </a>   
                    </td>    
                </tr>    
            @endforeach    
        </tbody>    
    </table>    
</x-app-layout>  
