<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Informasi Invoice: {{ $data_invoice->no_invoice }}</h3>
                <!-- Tombol Icon untuk Tambah, Edit, Hapus -->
                <div>
                    <a href="{{ route('invoice_detail.create', $data_invoice->id ) }}" class="text-white me-3" title="Tambah Detail">
                        <i class="fas fa-plus-circle fa-lg"></i>
                    </a>
                    <!-- Tombol Edit -->
                    <a href="{{ route('invoice_detail.edit-invoice-detail', $data_invoice->id) }}" class="text-white me-3" title="Edit Detail">
                        <i class="fas fa-edit fa-lg"></i>
                    </a>

                    <!-- Form Delete -->
                    <form action="{{ route('invoice_detail.delete', $data_invoice->id) }}" method="POST" style="display:inline;">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <h4 class="mb-3 text-secondary">Detail Invoice</h4>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>No Proyek :</strong> {{ $data_invoice->proyek->no_proyek }} </li>
                            <li class="list-group-item"><strong>Client :</strong> {{ $data_invoice->proyek->client->nama_client ?? 'N/A' }} </li>
                            <li class="list-group-item"><strong>Tanggal :</strong> {{ \Carbon\Carbon::parse($data_invoice->tanggal)->translatedFormat('l, j F Y') }}</li>
                            <li class="list-group-item"><strong>Catatan :</strong> {{ $data_invoice->catatan }}</li>
                            <li class="list-group-item"><strong>Termin :</strong> {{ $data_invoice->proyek->termin }}</li>
                        </ul>
                    </div>
                </div>

                <div class="mt-4">
                    <h5 class="text-secondary">Detail Pembayaran</h5>
                    <table class="table table-bordered table-striped">
                    @if($data_invoice->detail)
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>QTY</th>
                                    <th>Total</th>
                                </tr>
                                @foreach($data_invoice->detail as $detail)
                                    <tr>
                                        <td>{{ $detail->deskripsi }}</td>
                                        <td>Rp {{ number_format($detail->harga, 2) }}</td>
                                        <td>{{ $detail->qty }}</td>
                                        <td>Rp {{ number_format($detail->total, 2) }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>Tidak ada detail invoice.</p>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
