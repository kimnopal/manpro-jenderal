<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <!-- Invoice Header Card -->
                <div class="card shadow-lg mb-4">
                    <div class="card-header">
                        <h3 class="mb-0">Informasi Invoice: {{ $invoice->no_invoice }}</h3>
                    </div>
                    
                    <!-- Invoice Content -->
                    <div class="card-body">
                        <div class="row">
                            <!-- Left Column - Invoice Details -->
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="card h-100">
                                    <div class="card-header bg-light py-2">
                                        <h5 class="mb-0 text-secondary">Detail Invoice</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item d-flex justify-content-between">
                                                <strong>No Proyek:</strong>
                                                <span>{{ $invoice->proyek->no_proyek }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <strong>Client:</strong>
                                                <span>{{ $invoice->proyek->client->nama_client ?? 'N/A' }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <strong>Tanggal:</strong>
                                                <span>{{ \Carbon\Carbon::parse($invoice->tanggal)->translatedFormat('l, j F Y') }}</span>
                                            </li>
                                            <li class="list-group-item d-flex justify-content-between">
                                                <strong>Catatan:</strong>
                                                <span>{{ $invoice->catatan }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column - Invoice Items -->
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header bg-light py-2 d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 text-secondary">Detail Pembayaran</h5>
                                        <div>
                                            @if($invoice->details->isEmpty())
                                                <a href="{{ route('invoice_detail.create', $invoice->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-plus-circle me-1"></i>Tambah
                                                </a>
                                            @else
                                                <a href="{{ route('invoice_detail.edit', $invoice->id) }}" class="btn btn-warning btn-sm me-2">
                                                    <i class="fas fa-edit me-1"></i>Edit
                                                </a>
                                                @foreach($invoice->details as $detail)
                                                    <form action="{{ route('invoice_detail.delete', $detail->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                            <i class="fas fa-trash-alt me-1"></i>Hapus
                                                        </button>
                                                    </form>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="card-body p-0">
                                        @if($invoice->details->isNotEmpty())
                                            @foreach($invoice->details as $detail)
                                                <div class="border-bottom p-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <strong>Deskripsi:</strong>
                                                            <span>{{ $detail->deskripsi }}</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <strong>Harga:</strong>
                                                            <span>Rp {{ number_format($detail->harga, 2) }}</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <strong>QTY:</strong>
                                                            <span>{{ $detail->qty }}</span>
                                                        </li>
                                                        <li class="list-group-item d-flex justify-content-between">
                                                            <strong>Total:</strong>
                                                            <span>Rp {{ number_format($detail->total, 2) }}</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted text-center my-3">Tidak ada detail invoice</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Terms Section -->
                <div class="card shadow-lg">
                    <div class="card-header bg-light py-2 d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 text-secondary">Informasi Termin Pembayaran</h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="badge bg-primary me-3">
                                Total Termin: {{ $invoice->proyek->termin }}
                            </span>
                            <a href="{{ route('pembayaran.create', $invoice->id) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-plus-circle me-1"></i>Tambah Termin
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Termin ke-</th>
                                        <th width="25%">Nominal</th>
                                        <th width="20%">Status</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($invoice->pembayaran as $index => $pembayaran)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>Termin {{ $pembayaran->termin_no }}</td>
                                            <td>Rp {{ number_format($pembayaran->nominal, 2) }}</td>
                                            <td>
                                                <span class="badge {{ $pembayaran->status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                                    {{ ucfirst($pembayaran->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('pembayaran.edit', ['invoice_id' => $pembayaran->invoice_id, 'id' => $pembayaran->id]) }}" 
                                                       class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('pembayaran.delete', $pembayaran->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                                onclick="return confirm('Yakin menghapus termin?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    <a href="{{ route('pembayaran.print', ['invoice_id' => $invoice->id, 'id' => $pembayaran->id]) }}" 
                                                        class="btn btn-info btn-sm" target="_blank">
                                                        <i class="fas fa-print"></i> Print
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-3">Belum ada data termin pembayaran</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>