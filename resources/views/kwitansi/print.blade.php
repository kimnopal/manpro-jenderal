<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Kwitansi - {{ $kwitansi->kode_pembayaran }}</title>  
    <style>  
        /* Tambahkan gaya CSS untuk tampilan cetak */  
        body {  
            font-family: Arial, sans-serif;  
            margin: 20px;  
        }  
        .kwitansi {  
            border: 1px solid #000;  
            padding: 20px;  
            width: 80%;  
            margin: auto;  
        }  
        h1 {  
            text-align: center;  
        }  
    </style>  
</head>  
<body>  
    <div class="kwitansi">  
        <h1>Kwitansi Pembayaran</h1>  
        <p><strong>ID Proyek:</strong> {{ $kwitansi->id_proyek }}</p>  
        <p><strong>Status:</strong> {{ $kwitansi->status }}</p>  
        <p><strong>Nominal:</strong> {{ number_format($kwitansi->nominal, 2, ',', '.') }}</p>  
        <p><strong>Kode Pembayaran:</strong> {{ $kwitansi->kode_pembayaran }}</p>  
        <p><strong>Tanggal:</strong> {{ $kwitansi->created_at->format('d-m-Y') }}</p>  
    </div>  
    <script>  
        window.print(); // Memanggil fungsi print saat halaman dimuat  
    </script>  
</body>  
</html>  
