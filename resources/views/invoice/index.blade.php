<x-app-layout>  
    <div class="d-flex justify-content-between mt-3">  
        <h4>Daftar Invoice</h4>  
        <a href="{{ route('invoice.create-invoice') }}" class="btn btn-primary mx-2">  
            <i class="fa-solid fa-plus"></i> Tambah Invoice  
        </a>  
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
                    <td>{{ $invoice->client }}</td>  
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
</x-app-layout>  
