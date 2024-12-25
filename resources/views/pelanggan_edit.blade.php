@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Data Pelanggan
                </div>
                <div class="card-body">
                    <!-- Form menggunakan POST dengan method PUT -->
                    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kode_pelanggan">Kode Pelanggan</label>
                            <input id="kode_pelanggan" class="form-control" type="text" name="kode_pelanggan"
                                value="{{ $pelanggan->kode_pelanggan ?? old('kode_pelanggan') }}">
                            <span class="text-danger">{{ $errors->first('kode_pelanggan') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input id="nama_pelanggan" class="form-control" type="text" name="nama_pelanggan"
                                value="{{ $pelanggan->nama_pelanggan ?? old('nama_pelanggan') }}">
                            <span class="text-danger">{{ $errors->first('nama_pelanggan') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="kendaraan">Kendaraan</label>
                            <select id="kendaraan" class="form-control" name="kendaraan">
                                @foreach ($list_sp as $a)
                                    <option value="{{ $a }}" @selected($a == $pelanggan->kendaraan)>{{ $a }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('kendaraan') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input id="no_hp" class="form-control" type="text" name="no_hp"
                                value="{{ $pelanggan->no_hp ?? old('no_hp') }}">
                            <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" class="form-control" type="text" name="alamat"
                                value="{{ $pelanggan->alamat ?? old('alamat') }}">
                            <span class="text-danger">{{ $errors->first('alamat') }}</span>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                    </form> <!-- Form ditutup di sini -->
            </div>
        </div>
    </div>
</div>
</div>
@endsection
