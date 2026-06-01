<!DOCTYPE html>
<html>
<head>
    <h2>Ringkasan Pesanan</h2>

<table>

<tr>
    <td>Total Pesanan</td>
    <td>{{ $totalPesanan }}</td>
</tr>

<tr>
    <td>Pending</td>
    <td>{{ $pending }}</td>
</tr>

<tr>
    <td>Menunggu</td>
    <td>{{ $menunggu }}</td>
</tr>

<tr>
    <td>Diproses</td>
    <td>{{ $diproses }}</td>
</tr>

<tr>
    <td>Selesai</td>
    <td>{{ $selesai }}</td>
</tr>

<tr>
    <td>Dibatalkan</td>
    <td>{{ $dibatalkan }}</td>
</tr>

</table>

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

<h2>Daftar Pesanan</h2>

<table>

<tr>
    <th>ID</th>
    <th>Pembeli</th>
    <th>Total</th>
    <th>Status</th>
    <th>Tanggal</th>
</tr>

@foreach($pesanan as $item)

<tr>

    <td>
        {{ $item->id_pesanan }}
    </td>

    <td>
        {{ $item->nama_penerima }}
    </td>

    <td>
        Rp {{ number_format($item->total_harga,0,',','.') }}
    </td>

    <td>
        {{ ucfirst($item->status_pesanan) }}
    </td>

    <td>
        {{ $item->tanggal_pesanan }}
    </td>

</tr>

@endforeach

</table>

</body>
</html>