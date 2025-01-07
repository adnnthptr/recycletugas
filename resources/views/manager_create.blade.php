@extends('layouts.pestkit')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tambah Data Manager
                </div>
                <div class="card-body">
                    <form action="{{ route('manager_store') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="kode_manager">Kode Manager</label>
                            <input id="kode_manager" class="form-control" type="text" name="kode_manager"
                                value="{{ old('kode_manager') }}">
                            <span class="text-danger">{{ $errors->first('kode_manager') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="nama_manager">Nama Manager</label>
                            <input id="nama_manager" class="form-control" type="text" name="nama_manager"
                                value="{{ old('nama_manager') }}">
                            <span class="text-danger">{{ $errors->first('nama_manager') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="tugas_manager">Tugas Manager</label>
                            <select id="tugas_manager" class="form-control" name="tugas_manager">
                                @foreach ($list_sp as $a)
                                <option value="{{ $a }}" @selected($a == old('tugas_manager'))>{{ $a }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tugas_manager') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input id="no_hp" class="form-control" type="text" name="no_hp"
                                value="{{ old('no_hp') }}">
                            <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" class="form-control" type="text" name="alamat"
                                value="{{ old('alamat') }}">
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form> <!-- Form ditutup di sini -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection
