<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Laporan Transaksi</title>
    <style >
        table.biodata {
            /* border: 1px solid #000; */
            border-collapse: collapse;
            /* margin-left: 70px; */
        }
        table.nilai, td.bordered {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 3px;
            /* margin:auto; */
        }
    </style>


</head>

<body>
    <h3 align="center">Laporan Transaksi Opetshop</h3>
    <hr>
    {{-- <div class="container"> --}}
        <table class="table" >
            <thead>
                <tr >
                    <td class="bordered"width="5%">No</td>
                    <td class="bordered" width="20%">Tanggal</td>
                    <td class="bordered" width="30%">Nama Pelanggan</td>
                    <td class="bordered" width="45%">Total Belanja</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $item)
                
                <tr>
                    <td class="bordered">{{ $loop->iteration }}</td>
                    <td class="bordered">{{ date('d-m-Y', strtotime($item->created_at)); }}</td>
                    <td class="bordered">{{ $item->name }}</td>
                    <td class="bordered">{{ $item->total_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    {{-- </div> --}}
    
    <br><br><br>

    <?php
        function tgl_indo($tanggal){
            $bulan = array (
                1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
            );
            $pecahkan = explode('-', $tanggal);
            
            // variabel pecahkan 0 = tanggal
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tahun
        
            return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }
    ?>
    <p align="right" id="tanggal" style="margin-right:1.5em">Jambi, {{tgl_indo(date('Y-m-d')) }}</p>
    <p align="right" id="tanggal" style="margin-bottom: 4em;margin-right:75px">Owner,</p>

    <p align="right" style="margin-right: 85px"></p>
</body>
</html>