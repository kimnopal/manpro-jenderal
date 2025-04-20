<x-app-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg">
                    <div class="card-header">
                        <h3 class="mb-0">Informasi Invoice: {{ $invoice->no_invoice }}</h3>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                            <!-- Invoice Information Column -->
                            <div class="col-md-6 mb-4 mb-md-0">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0 text-secondary">Detail Invoice</h5>
                                    </div>
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">
                                                <strong>No Proyek:</strong> {{ $invoice->proyek->no_proyek }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Client:</strong> {{ $invoice->proyek->client->nama_client ?? 'N/A' }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($invoice->tanggal)->translatedFormat('l, j F Y') }}
                                            </li>
                                            <li class="list-group-item">
                                                <strong>Catatan:</strong> {{ $invoice->catatan }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- pembayaran Details Column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0 text-secondary">Detail Pembayaran</h5>
                                        @if($invoice->details->isEmpty())
                                            <a href="{{ route('invoice_detail.create', $invoice->id) }}" class="btn btn-primary btn-sm" style="padding: 3px 6px; font-size: 0.75rem; line-height: 1.5;">
                                                <i class="fas fa-plus-circle"></i> Tambah Detail
                                            </a>
                                        @else
                                            <div>
                                                <a href="{{ route('invoice_detail.edit', $invoice->id) }}" class="btn btn-warning btn-sm me-2" style="padding: 3px 6px; font-size: 0.75rem; line-height: 1.5;">
                                                    <i class="fas fa-edit"></i> Edit Detail
                                                </a>
                                                @foreach($invoice->details as $detail)
                                                    <form action="{{ route('invoice_detail.delete', $detail->id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" style="padding: 3px 6px; font-size: 0.75rem; line-height: 1.5;" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                                            <i class="fas fa-trash-alt"></i> Hapus
                                                        </button>
                                                    </form>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <div class="card-body p-0">
                                        @if($invoice && $invoice->details->isNotEmpty())
                                            @foreach($invoice->details as $detail)
                                                <div class="mb-3 border-bottom pb-3">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">
                                                            <strong>Deskripsi:</strong> {{ $detail->deskripsi }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Harga:</strong> Rp {{ number_format($detail->harga, 2) }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>QTY:</strong> {{ $detail->qty }}
                                                        </li>
                                                        <li class="list-group-item">
                                                            <strong>Total:</strong> Rp {{ number_format($detail->total, 2) }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-danger text-center my-3">Tidak ada detail invoice.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <!-- New pembayaran Table Section -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg mb-4">
                    <div class="card-header bg-light py-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0 text-secondary">Informasi Termin Pembayaran</h5>
                                <a href="{{ route('pembayaran.create', $invoice->id) }}" class="btn btn-primary btn-sm" style="padding: 3px 6px; font-size: 0.75rem; line-height: 1.5;">
                                    <i class="fas fa-plus-circle"></i> Tambah Termin
                                </a>
                            <div class="badge bg-primary">
                                Total Termin: {{ $invoice->proyek->termin }}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Termin ke-</th>
                                        <th width="25%">Nominal</th>
                                        <th width="20%">Status</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 1;
                                    @endphp
                                    @forelse($invoice->pembayaran as $pembayaran)
                                    <tr>
                                        <td>{{ $i++ }}</td>  
                                        <td>{{ $pembayaran->termin_no }}</td>
                                        <td>Rp. {{ number_format($pembayaran->nominal, 2) }}</td>
                                        <td>
                                            <span class="badge {{ $pembayaran->status == 'paid' ? 'bg-success' : 'bg-warning' }}">
                                                {{ ucfirst($pembayaran->status) }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('pembayaran.edit', ['invoice_id' => $pembayaran->invoice_id, 'id' => $pembayaran->id]) }}" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('pembayaran.delete', $pembayaran->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" 
                                                            onclick="return confirm('Yakin menghapus termin?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada data termin pembayaran</td>
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