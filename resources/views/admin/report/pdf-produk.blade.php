<!DOCTYPE html>
<html>
<head>
    <h1>Laporan Produk FLOMART</h1>

<p>Total Produk : {{ $totalProduk }}</p>

<p>Total Stok : {{ $totalStok }}</p>

<p>Produk Habis : {{ $produkHabis }}</p>

<hr>

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

<h1>Laporan Produk FLOMART</h1>

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