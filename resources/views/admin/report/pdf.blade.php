<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <title>Laporan Pesanan</title>

    <style>

        body{
            font-family: sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        th,td{
            border:1px solid #000;
            padding:8px;
            text-align:left;
        }

        th{
            background:#eee;
        }

    </style>

</head>
<body>

    <h2>Laporan Pesanan FLOMART</h2>

    <table>

        <thead>

            <tr>

                <th>ID</th>
                <th>Pembeli</th>
                <th>Total</th>
                <th>Status</th>
                <th>Tanggal</th>

            </tr>

        </thead>

        <tbody>

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

        </tbody>

    </table>

</body>
</html>