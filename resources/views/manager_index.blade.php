@extends('layouts.app')
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
                                <th>Kode Manager</th>
                                <th>Nama Manager</th>
                                <th>Tugas Manager</th>
                                <th>Nomor Hp</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($manager as $a)
                            <tr>
                            <td>{{ $a->id }}</td>
                            <td>{{ $a->kode_manager }}</td>
                            <td>{{ $a->nama_manager }}</td>
                            <td>{{ $a->tugas_manager }}</td> 
                            <td>{{ $a->no_hp }}</td>     
                            <td>{{ $a->alamat }}</td>
                            <td>
                              <a href="{{ url('manager/'.$a->id.'/edit') }}" class="btn btn-primary btn-sm">Edit</a>
                              <form action="{{ url('manager/'.$a->id) }}" method="post" class="d-inline"
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
                    {{ $manager->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
