<x-app-layout>  
    <div class="d-flex justify-content-between mt-3">  
        <h4>Daftar Pembayaran</h4>  
        <a href="{{ route('pembayaran.create-pembayaran') }}" class="btn btn-primary mx-2">  
            <i class="fa-solid fa-plus"></i> Tambah Pembayaran  
        </a>  
    </div>  
  
    <table class="table mt-3">  
        <thead>  
            <tr>  
                <th>No</th>
                <th>Proyek ID</th>  
                <th>Status</th>  
                <th>Nominal</th>  
                <th>Kode Pembayaran</th>  
                <th>Aksi</th>  
            </tr>  
        </thead>  
        <tbody>  
            @php
            $i = 1
            @endphp
            @foreach($data_pembayaran as $item)  
                <tr>
                    <td>{{ $i++ }}</td>  
                    <td>{{ $item->id_proyek }}</td>  
                    <td>{{ $item->status }}</td>  
                    <td>{{ $item->nominal }}</td>  
                    <td>{{ $item->kode_pembayaran }}</td>  
                    <td>  
                        <a href="{{ route('pembayaran.edit-pembayaran', $item->id) }}" class="btn btn-warning">Edit</a>  
                        <form action="{{ route('pembayaran.delete', $item->id) }}" method="GET" style="display:inline;">  
                            @csrf  
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>  
                        </form>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
</x-app-layout>  
