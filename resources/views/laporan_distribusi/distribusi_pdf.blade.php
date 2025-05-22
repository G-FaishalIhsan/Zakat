<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Distribusi Zakat Fitrah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            margin-bottom: 5px;
        }
        .header p {
            margin-top: 0;
            font-size: 10pt;
            color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #000;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h3 {
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 14pt;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 10pt;
        }
        .signature {
            margin-top: 60px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Distribusi Zakat Fitrah</h2>
        <p>Tanggal: {{ date('d-m-Y') }}</p>
    </div>
    
    <h3>A. Distribusi Ke Mustahik Warga</h3>
    <table>
        <thead>
            <tr>
                <th>Kategori Mustahik</th>
                <th>Hak Beras</th>
                <th>Jumlah KK</th>
                <th>Total Beras</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($distribusiWarga as $item)
            <tr>
                <td>{{ $item->nama_kategori ?? '-' }}</td>
                <td>2.5 Kg</td>
                <td>{{ $item->jumlah_kk ?? '0' }}</td>
                <td>{{ $item->total_beras ?? '0' }} Kg</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <h3>B. Distribusi Ke Mustahik Lainnya</h3>
    <table>
        <thead>
            <tr>
                <th>Kategori Mustahik</th>
                <th>Hak Beras</th>
                <th>Jumlah KK</th>
                <th>Total Beras</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($distribusiLainnya as $item)
            <tr>
                <td>{{ $item->nama_kategori ?? '-' }}</td>
                <td>2.5 Kg</td>
                <td>{{ $item->jumlah_kk ?? '0' }}</td>
                <td>{{ $item->total_beras ?? '0' }} Kg</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <h3>Total Distribusi Per Kategori</h3>
    <table>
        <thead>
            <tr>
                <th>Kategori Mustahik</th>
                <th>Total Beras</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($totalDistribusiPerCategory as $item)
            <tr>
                <td>{{ $item['kategori'] ?? '-' }}</td>
                <td>{{ $item['total_beras'] ?? '0' }} Kg</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" style="text-align: center;">Tidak ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="footer">
        <p>Laporan ini dibuat secara otomatis oleh sistem zakat fitrah</p>
        
        <div class="signature">
            <p>Petugas Zakat</p>
            <br><br><br>
            <p>_________________________</p>
        </div>
    </div>
</body>
</html>