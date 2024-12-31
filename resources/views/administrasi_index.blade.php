@extends('layouts.app')
@section('content')
<style>
    .harga-display {
        display: inline-block;
        text-align: right;
        min-width: 100px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $judul }}
                </div>
                <div class="card-body">
                    @if(session('pesan'))
                        <div class="alert alert-success">
                            {{ session('pesan') }}
                        </div>
                    @endif
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Administrasi</th>
                                <th>Pelanggan</th>
                                <th>Mekanik</th>
                                <th>Jenis Masalah Kendaraan</th>
                                <th>Harga</th>
                                <th>Metode Pembayaran</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($administrasi as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->kode_administrasi }}</td>
                                <td>{{ $a->pelanggan }}</td>
                                <td>{{ $a->mekanik }}</td>
                                <td>{{ $a->jenis_masalah kendaraan }}</td>
                                <td>Rp. {{ number_format ($a->harga) }}</td> 
                                <td>{{ $a->metode_pembayaran }}</td>
                                <td>{{ date('d M Y' strtotime($a->tanggal)) }}</td>
                                <td> Rp <span class="biaya-display">{{ number_format ($a->harga, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td>
                                  <a href="{{ route('administrasi.edit', $a->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                  <form action="{{ route('administrasi.destroy', $a->id) }}" method="post" class="d-inline"
                                  onsubmit="return confirm('Apakah yakin ingin menghapus?')">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                  </form>
                                </td>
                            </tr>
                          @empty
                            <tr>
                                <td colspan="7" class="text-center">Data administrasi tidak tersedia</td>
                            </tr>
                          @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $administrasi->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
