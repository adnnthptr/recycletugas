@extends('layouts.pestkit')
@section('title', 'Data Mekanik')
@section('content')
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
                                <th>Kode Mekanik</th>
                                <th>Nama Mekanik</th>
                                <th>Bidang Mekanik</th>
                                <th>Nomor Hp</th>
                                <th>Jenis Masalah Kendaraan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($mekanik as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_mekanik }}</td>
                                <td>{{ $a->nama_mekanik }}</td>
                                <td>{{ $a->bidang_mekanik }}</td> 
                                <td>{{ $a->no_hp }}</td>     
                                <td>{{ $a->jenis_masalah_kendaraan }}</td>
                                <td>
                                  <a href="{{ route('mekanik_edit', $a->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                  <form action="{{ route('mekanik_destroy', $a->id) }}" method="post" class="d-inline"
                                  onsubmit="return confirm('Apakah yakin ingin menghapus?')">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                  </form>
                                </td>
                            </tr>
                          @empty
                            <tr>
                                <td colspan="7" class="text-center">Data mekanik tidak tersedia</td>
                            </tr>
                          @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $mekanik->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
