<x-app-layout>    
    <div class="d-flex justify-content-between mt-3">  
        <h4>Daftar Kwitansi</h4>  
        <form action="{{ route('kwitansi.index') }}" method="GET" class="d-flex">  
            <input type="text" name="search" class="form-control" placeholder="Cari..." value="{{ request('search') }}">  
            <button type="submit" class="btn btn-primary mx-2">Cari</button>  
        </form>  
        <a href="{{ route('kwitansi.create-kwitansi') }}" class="btn btn-primary mx-2">  
            <i class="fa-solid fa-plus"></i> Tambah Kwitansi  
        </a>  
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
