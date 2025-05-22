php
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
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Pengumpulan Zakat Fitrah</h2>
        <p>Tanggal: {{ date('d-m-Y') }}</p>
    </div>
    
    <table>
        <tr>
            <th width="50%">Total Muzakki</th>
            <td>{{ $totalMuzakki }} orang</td>
        </tr>
        <tr>
            <th>Total Jiwa</th>
            <td>{{ $totalJiwa }} jiwa</td>
        </tr>
        <tr>
            <th>Total Beras</th>
            <td>{{ $totalBeras }} kg</td>
        </tr>
        <tr>
            <th>Total Uang</th>
            <td>Rp {{ number_format($totalUang, 0, ',', '.') }}</td>
        </tr>
    </table>
    
    <div class="footer">
        <p>Dicetak pada: {{ date('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>
