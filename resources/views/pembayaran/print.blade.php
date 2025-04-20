<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Termin Pembayaran #{{ $pembayaran->id }}</title>
    <style>
        @page {
            size: A4;
            margin: 1cm;
        }
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }
        .info-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .signature {
            margin-top: 50px;
            display: flex;
            justify-content: space-between;
        }
        @media print {
            .no-print {
                display: none;
            }
            body {
                font-size: 12pt;
            }
            .header {
                margin-top: 0;
            }
        }
    </style>
</head>
<body>
    <div class="no-print" style="text-align: right; margin-bottom: 10px;">
        <button onclick="window.print()" class="btn btn-primary">
            <i class="fas fa-print"></i> Cetak
        </button>
        <button onclick="window.close()" class="btn btn-secondary">
            <i class="fas fa-times"></i> Tutup
        </button>
    </div>

    <div class="header">
        <h2>INVOICE PEMBAYARAN TERMIN</h2>
        <!-- <h3>No: {{ $pembayaran->kode_pembayaran ?? 'TRM-'.str_pad($pembayaran->id, 5, '0', STR_PAD_LEFT) }}</h3> -->
    </div>

    <div class="info-box">
        <div style="display: flex; justify-content: space-between;">
            <div>
                <p><strong>No Invoice:</strong> {{ $invoice->no_invoice }}</p>
                <p><strong>No Proyek:</strong> {{ $invoice->proyek->no_proyek }}</p>
                <p><strong>Client:</strong> {{ $invoice->proyek->client->nama_client }}</p>
            </div>
            <div>
                <p><strong>Tanggal Invoice:</strong> {{ $invoice->tanggal_formatted }}</p>
                <p><strong>Termin ke:</strong> {{ $pembayaran->termin_no }}</p>
                <p><strong>Tanggal Pembayaran:</strong>{{ now()->format('d/m/Y') }}</p>
            </div>
        </div>
    </div>

    <h4>Detail Invoice:</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->details as $detail)
            <tr>
                <td>{{ $detail->deskripsi }}</td>
                <td class="text-right">Rp {{ number_format($detail->harga, 2) }}</td>
                <td>{{ $detail->qty }}</td>
                <td class="text-right">Rp {{ number_format($detail->total, 2) }}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-right"><strong>Total Invoice:</strong></td>
                <td class="text-right">Rp {{ number_format($invoice->details->sum('total'), 2) }}</td>
            </tr>
        </tbody>
    </table>

    <h4>Detail Pembayaran Termin:</h4>
    <table class="table">
        <tr>
            <th width="30%">Nominal Termin</th>
            <td class="text-right">Rp {{ number_format($pembayaran->nominal, 2) }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>
                <span style="font-weight: bold; color: {{ $pembayaran->status == 'paid' ? 'green' : 'orange' }}">
                    {{ strtoupper($pembayaran->status) }}
                </span>
            </td>
        </tr>
        <tr>
            <th>Kode Pembayaran</th>
            <td>{{ $pembayaran->kode_pembayaran ?? '-' }}</td>
        </tr>
        <!-- <tr>
            <th>Keterangan</th>
            <td>{{ $pembayaran->keterangan ?? '-' }}</td>
        </tr> -->
    </table>

    <div class="signature">
        <div style="width: 40%;">
            <p>Diterima oleh:</p>
            <br><br><br>
            <p>_________________________</p>
            <p>({{ $invoice->proyek->client->nama_client }})</p>
        </div>
        <div style="width: 40%;">
            <p>Hormat kami,</p>
            <br><br><br>
            <p>_________________________</p>
            <p>({{ auth()->user()->name }})</p>
        </div>
    </div>

    <script>
        window.onload = function() {
            // Auto print jika diinginkan (opsional)
            // setTimeout(() => { window.print(); }, 500);
        }
    </script>
</body>
</html>