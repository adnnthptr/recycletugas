@extends('layouts.app')
@section('title', 'Data Pelanggan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $judul }}
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kode Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Kendaraan</th>
                                <th>Nomor Hp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($pelanggan as $a)
                            <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->kode_pelanggan }}</td>
                            <td>{{ $a->nama_pelanggan }}</td>
                            <td>{{ $a->kendaraan }}</td>
                            <td>{{ $a->no_hp }}</td>     
                            <td>{{ $a->alamat }}</td>
                            <td>
                              <a href="{{ url('pelanggan/'.$a->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                              <form action="{{ url('pelanggan/'.$a->id) }}" method="post" class="d-inline"
                              onsubmit="return confirm('Apakah Dihapus?')">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                              </form>
                            </td>
                            </tr>
                         @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $pelanggan->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
