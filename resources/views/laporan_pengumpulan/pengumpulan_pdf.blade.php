<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengumpulan Zakat Fitrah</title>
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
        <h2>Laporan Pengumpulan Zakat Fitrah</h2>
        <p>Tanggal: {{ date('d-m-Y') }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th width="50%">Isi</th>
                <th width="50%">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>Total Muzakki:</strong> {{ $totalMuzakki }} Keluarga
                </td>
                <td>
                    Total Muzakki merupakan jumlah total Muzakki yang mengumpulkan zakat fitrah
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Total Jiwa:</strong> {{ $totalJiwa }} Orang
                </td>
                <td>
                    Total Jiwa merupakan jumlah orang/jiwa yang mengumpulkan zakat (diambil dari atribut jumlah_tanggungan pada tabel muzakki)
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Total Beras:</strong> {{ $totalBeras }} Kg
                </td>
                <td>
                    Total beras merupakan jumlah total beras yang terkumpul
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Total Uang:</strong> Rp{{ number_format($totalUang, 0, ',', '.') }}
                </td>
                <td>
                    Total uang merupakan jumlah total beras yang terkumpul
                </td>
            </tr>
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