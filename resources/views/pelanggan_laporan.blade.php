<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pelanggan</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
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
                            <th>ID</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Kendaraan</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pelanggan as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->kode_pelanggan }}</td>
                            <td>{{ $a->nama_pelanggan }}</td>
                            <td>{{ $a->kendaraan }}</td>
                            <td>{{ $a->no_hp }}</td>
                            <td>{{ $a->alamat }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Tidak Ditemukan</td>
                        </tr>
                        @endforelse
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
