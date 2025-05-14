<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KWITANSI PEMBAYARAN - {{ $kwitansi->invoice->no_invoice ?? '' }}</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            margin: 2cm;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px double #000;
            padding-bottom: 10px;
        }
        .company-info {
            margin-bottom: 30px;
        }
        .kwitansi-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            text-decoration: underline;
        }
        .info-box {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .info-item {
            width: 48%;
        }
        .info-label {
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }
        .amount-box {
            border: 2px solid #000;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            font-size: 18px;
        }
        .signature-container {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }
        .signature-box {
            width: 200px;
            text-align: center;
        }
        .signature-line {
            border-top: 1px solid #000;
            margin-top: 60px;
            padding-top: 5px;
        }
        .watermark {
            position: absolute;
            opacity: 0.1;
            font-size: 180px;
            transform: rotate(-45deg);
            top: 40%;
            left: 35%;
            z-index: -1;
        }
        .no-print {
            display: none;
        }
        @media print {
            .no-print {
                display: none;
            }
            body {
                margin: 1cm;
            }
        }
    </style>
</head>
<body>
    <!-- Tombol Aksi (Hanya Tampil di Browser) -->
    <div class="no-print" style="text-align: right; margin-bottom: 20px;">
        <button onclick="window.print()" style="padding: 8px 15px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
            🖨️ Cetak Kwitansi
        </button>
        <button onclick="window.close()" style="padding: 8px 15px; background: #f44336; color: white; border: none; border-radius: 4px; cursor: pointer; margin-left: 10px;">
            ✖️ Tutup
        </button>
    </div>

    <!-- Header Perusahaan -->
    <div class="header">
        <h1 style="margin-bottom: 5px;">CV. JENDERAL SOLUSI DIGITAL</h1>
        <p style="margin-top: 0;"> Jl. Amad I, Dusun II Sokaraja Kidul, Sokaraja Kidul, Kec. Sokaraja, Kabupaten Banyumas, Jawa Tengah 53181 | Telp: 085172378297 </p>
    </div>

    <!-- Judul Kwitansi -->
    <div class="kwitansi-title">
        KWITANSI PEMBAYARAN
    </div>

    <!-- Nomor Kwitansi -->
    <div style="text-align: right; margin-bottom: 20px;">
        <p style="margin: 0;"><strong>No. Kwitansi:</strong> {{ str_pad($kwitansi->no_kwitansi, 5, '0', STR_PAD_LEFT) }}</p>
        <p style="margin: 0;"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($kwitansi->tanggal)->translatedFormat('d F Y') }}</p>
    </div>

    <!-- Informasi Pembayaran -->
    <div class="info-box">
        <div class="info-item">
            <p><span class="info-label">Telah diterima dari</span>: {{ $kwitansi->invoice->proyek->client->nama_client }}</p>
            <p><span class="info-label">Alamat Client </span>: {{ $kwitansi->invoice->proyek->client->alamat_client }}</p>
            <p><span class="info-label">Tujuan pembayaran</span>: {{ $kwitansi->tujuan }}</p>
        </div>
        <div class="info-item">
            <p><span class="info-label">No. Invoice</span>: {{ $kwitansi->invoice->no_invoice }}</p>
            <p><span class="info-label">No. Proyek</span>: {{ $kwitansi->invoice->proyek->no_proyek }}</p>
        </div>
    </div>

    <!-- Jumlah Pembayaran -->
    <div class="amount-box">
        <p style="margin: 0;">Uang sejumlah:</p>
        <h2 style="margin: 10px 0;">Rp {{ number_format($kwitansi->total, 0, ',', '.') }}</h2>
        <p style="margin: 0; font-style: italic;">
            @php
                function penyebut($nilai) {
                    $nilai = abs($nilai);
                    $huruf = ["", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas"];
                    $temp = "";
                    if ($nilai < 12) $temp = " ". $huruf[$nilai];
                    elseif ($nilai < 20) $temp = penyebut($nilai - 10). " Belas";
                    elseif ($nilai < 100) $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
                    elseif ($nilai < 200) $temp = " Seratus". penyebut($nilai - 100);
                    elseif ($nilai < 1000) $temp = penyebut($nilai/100). " Ratus". penyebut($nilai % 100);
                    elseif ($nilai < 2000) $temp = " Seribu". penyebut($nilai - 1000);
                    elseif ($nilai < 1000000) $temp = penyebut($nilai/1000). " Ribu". penyebut($nilai % 1000);
                    elseif ($nilai < 1000000000) $temp = penyebut($nilai/1000000). " Juta". penyebut($nilai % 1000000);
                    return $temp;
                }
                echo trim(penyebut($kwitansi->total)) . ' Rupiah';
            @endphp
        </p>

    <!-- Keterangan Tambahan -->
    <div style="margin: 20px 0;">
        <p><strong>Keterangan</strong>:</p>
        <p>Bukti Pelunasan Semua Termin Untuk Proyek</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="signature-container">
        <div class="signature-box">
            <p>Penerima,</p>
            <div class="signature-line"></div>
            <p>({{ $kwitansi->invoice->proyek->client->nama_client }})</p>
        </div>
        <div class="signature-box">
            <p>Hormat kami,</p>
            <div class="signature-line"></div>
            <p>({{ auth()->user()->name }})</p>
            <p>CV. Jenderal Solusi Digital</p>
        </div>
    </div>

    <!-- Watermark -->
    <div class="watermark">
        LUNAS
    </div>

    <script>
        // Auto print jika diinginkan
        window.onload = function() {
            setTimeout(() => { 
                if (window.location.search.includes('autoprint')) {
                    window.print(); 
                }
            }, 500);
        }
    </script>
</body>
</html>