<!DOCTYPE html>
<html>
<head>

<title>Laporan FLOMART</title>

<style>

body{
    font-family: Arial;
}

table{
    width:100%;
    border-collapse: collapse;
    margin-top:10px;
}

th,td{
    border:1px solid black;
    padding:8px;
}

h1,h2{
    margin-top:25px;
}

</style>

</head>

<body>

<h1>LAPORAN FLOMART</h1>

<p>
Tanggal Cetak :
{{ now()->format('d F Y H:i') }}
</p>

<hr>

<h2>Ringkasan Bisnis</h2>

<table>

<tr>
<td>Total Pendapatan</td>
<td>
Rp {{ number_format($totalPendapatan,0,',','.') }}
</td>
</tr>

<tr>
<td>Total Produk</td>
<td>{{ $totalProduk }}</td>
</tr>

<tr>
<td>Total Pesanan</td>
<td>{{ $totalPesanan }}</td>
</tr>

</table>

<h2>Statistik Pesanan</h2>

<table>

<tr>
<th>Status</th>
<th>Jumlah</th>
</tr>

<tr>
<td>Selesai</td>
<td>{{ $pesananSelesai }}</td>
</tr>

<tr>
<td>Diproses</td>
<td>{{ $pesananDiproses }}</td>
</tr>

<tr>
<td>Menunggu</td>
<td>{{ $pesananMenunggu }}</td>
</tr>

<tr>
<td>Pending</td>
<td>{{ $pesananPending }}</td>
</tr>

<tr>
<td>Dibatalkan</td>
<td>{{ $pesananDibatalkan }}</td>
</tr>

</table>

<h2>Top 5 Produk Terlaris</h2>

<table>

<tr>
<th>Produk</th>
<th>Total Terjual</th>
</tr>

@foreach($produkTerlaris as $item)

<tr>

<td>
{{ $item->nama_produk }}
</td>

<td>
{{ $item->total_terjual }}
</td>

</tr>

@endforeach

</table>

<h2>Data Pesanan</h2>

<table>

<tr>
<th>ID</th>
<th>Pembeli</th>
<th>Total</th>
<th>Status</th>
</tr>

@foreach($pesananTerbaru as $item)

<tr>

<td>{{ $item->id_pesanan }}</td>

<td>{{ $item->nama_penerima }}</td>

<td>
Rp {{ number_format($item->total_harga,0,',','.') }}
</td>

<td>{{ $item->status_pesanan }}</td>

</tr>

@endforeach

</table>

<h2>Data Produk</h2>

<table>

<tr>
<th>ID</th>
<th>Produk</th>
<th>Harga</th>
<th>Stok</th>
</tr>

@foreach($produk as $item)

<tr>

<td>{{ $item->id_produk }}</td>

<td>{{ $item->nama_produk }}</td>

<td>
Rp {{ number_format($item->harga,0,',','.') }}
</td>

<td>{{ $item->stok }}</td>

</tr>

@endforeach

</table>

</body>
</html>