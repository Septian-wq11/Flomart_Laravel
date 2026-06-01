<!DOCTYPE html>
<html>
<head>

<title>Laporan Pendapatan FLOMART</title>

<style>

        body{
            font-family: Arial;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th,td{
            border:1px solid black;
            padding:8px;
        }

    </style>

</head>

<body>

<h1>Laporan Pendapatan FLOMART</h1>

<p class="info">
Tanggal Cetak :
{{ now()->format('d F Y H:i') }}
</p>

<hr>

<h2>Ringkasan Pendapatan</h2>

<table>

<tr>
    <td><strong>Total Pendapatan</strong></td>
    <td>
        Rp {{ number_format($totalPendapatan,0,',','.') }}
    </td>
</tr>

<tr>
    <td><strong>Total Pesanan Selesai</strong></td>
    <td>{{ $totalPesananSelesai }}</td>
</tr>

<tr>
    <td><strong>Rata-rata Pendapatan per Pesanan</strong></td>
    <td>
        Rp {{ number_format($rataPendapatan,0,',','.') }}
    </td>
</tr>

<tr>
    <td><strong>Pendapatan Bulan Ini</strong></td>
    <td>
        Rp {{ number_format($pendapatanBulanIni,0,',','.') }}
    </td>
</tr>

<tr>
    <td><strong>Pendapatan Hari Ini</strong></td>
    <td>
        Rp {{ number_format($pendapatanHariIni,0,',','.') }}
    </td>
</tr>

</table>

<h2>Detail Transaksi Pendapatan</h2>

<table>

<tr>
    <th>ID Pesanan</th>
    <th>Pembeli</th>
    <th>Tanggal</th>
    <th>Total</th>
</tr>

@foreach($riwayatPendapatan as $item)

<tr>

    <td>
        {{ $item->id_pesanan }}
    </td>

    <td>
        {{ $item->nama_penerima }}
    </td>

    <td>
        {{ date('d-m-Y', strtotime($item->tanggal_pesanan)) }}
    </td>

    <td>
        Rp {{ number_format($item->total_harga,0,',','.') }}
    </td>

</tr>

@endforeach

</table>

</body>
</html>