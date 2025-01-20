<x-app-layout>  
    <div class="d-flex justify-content-between mt-3">  
        <h4>Daftar Detail Invoice</h4>  
        <a href="{{ route('invoice_detail.create-invoice-detail') }}" class="btn btn-primary mx-2">  
            <i class="fa-solid fa-plus"></i> Tambah Detail Invoice  
        </a>  
    </div>  
  
    <table class="table mt-3">  
        <thead>  
            <tr>  
                <th>No.</th>  
                <th>Invoice ID</th>  
                <th>Deskripsi</th>  
                <th>Harga</th>  
                <th>Qty</th>  
                <th>Total</th>  
                <th>Aksi</th>  
            </tr>  
        </thead>  
        <tbody>  
            @php
            $i = 1
            @endphp
            @foreach($data_invoice_detail as $detail)  
                <tr>  
                    <td>{{ $i++ }}</td>  
                    <td>{{ $detail->invoice_id }}</td>  
                    <td>{{ $detail->deskripsi }}</td>  
                    <td>{{ $detail->harga }}</td>  
                    <td>{{ $detail->qty }}</td>  
                    <td>{{ $detail->total }}</td>  
                    <td>  
                        <a href="{{ route('invoice_detail.edit-invoice-detail', $detail->id) }}" class="btn btn-warning">Edit</a>  
                        <form action="{{ route('invoice_detail.delete', $detail->id) }}" method="GET" style="display:inline;">  
                            @csrf  
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>  
                        </form>  
                    </td>  
                </tr>  
            @endforeach  
        </tbody>  
    </table>  
</x-app-layout>  
