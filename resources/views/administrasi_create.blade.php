@extends('layouts.statedmaster')
@section('isinya')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Tambah Data Administrasi
                </div>
                <div class="card-body">
                    <form action="{{ route('administrasi.store') }}" method="POST">

                        @csrf
                        @method('POST')

                        <div class="form-group">
                            <label for="kode_administrasi">Kode Administrasi</label>
                            <input id="kode_administrasi" class="form-cphpontrol" type="text" name="kode_administrasi"
                                value="{{ old('kode_administrasi') }}">
                            <span class="text-danger">{{ $errors->first('kode_administrasi') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="pelanggan">Pelanggan</label>
                            <input id="pelanggan" class="form-cphpontrol" type="text" name="pelanggan"
                                value="{{ old('pelanggan') }}">
                            <span class="text-danger">{{ $errors->first('pelanggan') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="mekanik">Mekanik</label>
                            <input id="mekanik" class="form-cphpontrol" type="text" name="mekanik"
                                value="{{ old('mekanik') }}">
                            <span class="text-danger">{{ $errors->first('mekanik') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="jenis_masalah_kendaraan">Jenis Masalah Kendaraan</label>
                            <input id="jenis_masalah_kendaraan" class="form-control" type="text" name="jenis_masalah_kendaraan"
                                value="{{ old('jenis_masalah_kendaraan') }}">
                            <span class="text-danger">{{ $errors->first('jenis_masalah_kendaraann') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <select id="harga" class="form-control" name="harga">
                                @foreach ($list_sp as $a)
                                <option value="{{ $a }}" @selected($a == old('harga'))>{{ $a }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('harga') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="metode_pembayaran">Metode Pembayaran</label>
                            <input id="metode_pembayaran" class="form-control" type="text" name="metode_pembayaran"
                                value="{{ old('metode_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('metode_pembayaran') }}</span>
                        </div>
                        
                        <div class="form-group">
                            <label for="my-input">Tanggal</label>
                            <input id="tgl" class="form-control" type="date" name="tanggal"
                                value="{{ old('tanggal') }}">
                            <script>
                                document.getElementById("tgl").valueAsDate = new Date();
                            </script>
                            <span class="text-danger">{{ $errors->first('tanggal') }}</span>
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