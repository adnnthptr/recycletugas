@extends('layouts.statedmaster')
@section('isinya')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tambah Data Mekanik
                </div>
                <div class="card-body">
                    <form action="{{ route('mekanik.store') }}" method="POST">

                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="kode_mekanik">Kode Mekanik</label>
                            <input id="kode_mekanik" class="form-control" type="text" name="kode_mekanik"
                                value="{{ old('kode_mekanik') }}">
                            <span class="text-danger">{{ $errors->first('kode_mekanik') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="nama_mekanik">Nama Mekanik</label>
                            <input id="nama_mekanik" class="form-control" type="text" name="nama_mekanik"
                                value="{{ old('nama_mekanik') }}">
                            <span class="text-danger">{{ $errors->first('nama_mekanik') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="bidang_mekanik">Bidang Mekanik</label>
                            <select id="bidang_mekanik" class="form-control" name="bidang_mekanik">
                                @foreach ($list_sp as $a)
                                <option value="{{ $a }}" @selected($a == old('bidang_mekanik'))>{{ $a }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('bidang_mekanik') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="no_hp">Nomor HP</label>
                            <input id="no_hp" class="form-control" type="text" name="no_hp"
                                value="{{ old('no_hp') }}">
                            <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="jenis_masalah_kendaraan">Jenis Masalah Kendaraan</label>
                            <input id="jenis_masalah_kendaraan" class="form-control" type="text" name="jenis_masalah_kendaraan"
                                value="{{ old('jenis_masalah_kendaraan') }}">
                            <span class="text-danger">{{ $errors->first('jenis_masalah_kendaraan') }}</span>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
