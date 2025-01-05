@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tambah Data Pelanggan
                </div>
                <div class="card-body">
                    <form action="{{ route('pelanggan_store') }}" method="POST">

                        @csrf

                        <div class="form-group">
                            <label for="kode_pelanggan">Kode Pelanggan</label>
                            <input id="kode_pelanggan" class="form-control" type="text" name="kode_pelanggan"
                                value="{{ old('kode_pelanggan') }}">
                            <span class="text-danger">{{ $errors->first('kode_pelanggan') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input id="nama_pelanggan" class="form-control" type="text" name="nama_pelanggan"
                                value="{{ old('nama_pelanggan') }}">
                            <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="kendaraan">Kendaraan</label>
                            <select id="kendaraaan" class="form-control" name="kendaraan">
                                @foreach ($list_sp as $a)
                                <option value="{{ $a }}" @selected($a == old('kendaraaan'))>{{ $a }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('kendaraaan') }}</span>
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
