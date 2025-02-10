<x-app-layout>
    <div class="container mt-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <h3 class="mb-0">Informasi Invoice: {{ $invoice->no_invoice }}</h3>
                <h4 class="mb-3 text-secondary">Detail Invoice</h4>

                <div class="row">
                    <!-- Kolom Kiri: Detail Invoice -->
                    <div class="col-md-6">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>No Proyek :</strong> {{ $invoice->proyek->no_proyek }} </li>
                            <li class="list-group-item"><strong>Client :</strong> {{ $invoice->proyek->client->nama_client ?? 'N/A' }} </li>
                            <li class="list-group-item"><strong>Tanggal :</strong> {{ \Carbon\Carbon::parse($invoice->tanggal)->translatedFormat('l, j F Y') }}</li>
                            <li class="list-group-item"><strong>Catatan :</strong> {{ $invoice->catatan }}</li>
                            <li class="list-group-item"><strong>Termin :</strong> {{ $invoice->proyek->termin }}</li>
                        </ul>
                    </div>

                    <!-- Kolom Kanan: Detail Pembayaran -->
                    <div class="col-md-6">
                        <h5 class="text-secondary">Detail Pembayaran</h5>
                        <div class="card p-3 shadow-sm">
                            <table class="table table-bordered table-striped">
                                @if($invoice && $invoice->details->isNotEmpty())
                                    @foreach($invoice->details as $detail)
                                        <ul class="list-group">
                                            <li class="list-group-item"><strong>Deskripsi :</strong> {{ $detail->deskripsi }}</li>
                                            <li class="list-group-item"><strong>Harga :</strong> Rp {{ number_format($detail->harga, 2) }}</li>
                                            <li class="list-group-item"><strong>QTY :</strong> {{ $detail->qty }}</li>
                                            <li class="list-group-item"><strong>Total :</strong> Rp {{ number_format($detail->total, 2) }}</li>
                                        </ul>
                                    @endforeach
                                @else
                                    <p class="text-danger text-center">Tidak ada detail invoice.</p>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Bagian Tombol -->
                <div class="mt-4 text-center">
                    @if($invoice->details->isEmpty())
                        <!-- Tombol Tambah hanya muncul jika detail invoice kosong -->
                        <a href="{{ route('invoice_detail.create', $invoice->id) }}" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Tambah Detail
                        </a>
                    @else
                        <!-- Tombol Edit dan Delete hanya muncul jika ada detail invoice -->
                        <a href="{{ route('invoice_detail.edit', $invoice->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Edit Detail
                        </a>

                        <form action="{{ route('invoice_detail.delete', $detail->id) }}" method="POST" style="display:inline;">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">
                                <i class="fas fa-trash-alt"></i> Hapus Detail
                            </button>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
