<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Mekanik</title>

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
                            <td>Kode Mekanik</td>
                            <td>Nama Mekanik</td>
                            <td>Bidang Mekanik</td>
                            <td>Nomor Hp</td>
                            <td>Jenis Masalahkendaraan</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mekanik as $a)
                        <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->kode_mekanik }}</td>
                            <td>{{ $a->nama_mekanik }}</td>
                            <td>{{ $a->bidang_mekanik }}</td>
                            <td>{{ $a->no_hp }}</td>
                            <td>{{ $a->jenis_masalah_kendaraan }}</td>
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