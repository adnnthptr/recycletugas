<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Administrasi</title>

    <!-- Scripts-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center>
                    <h2>{{ $judul }}</h2>
                </center>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>Kode Administrasi</td>
                            <td>Pelanggan</td>
                            <td>Mekanik</td>
                            <td>Jenis Masalah Kendaraan</td>
                            <td>Harga</td>
                            <td>Metode Pembayaran</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($administrasi as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->kode_administrasi }}</td>
                            <td>{{ $a->pelanggan }}</td>
                            <td>{{ $a->mekanik }}</td>
                            <td>{{ $a->jenis_maslah kendaraan }}</td>
                            <td>{{ $a->harga }}</td>
                            <td>{{ $a->metode_pembayaran }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5>Mengetahui</h5>
                <br>
                <br>
                <br>
                <h5>Admin</h5>
            </div>
        </div>
    </div>
</body>

</html>