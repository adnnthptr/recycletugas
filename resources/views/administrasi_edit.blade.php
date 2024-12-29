@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Data Mekanik
                </div>
                <div class="card-body">
                    <!-- Form menggunakan POST dengan method PUT -->
                    <form action="{{ route('mekanik.update', $mekanik->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="kode_administrasi">Kode Administrasi</label>
                            <input id="kode_administrasi" class="form-control" type="text" name="kode_administrasi"
                                value="{{ $mekanik->kode_administrasi ?? old('kode_administrasi') }}">
                            <span class="text-danger">{{ $errors->first('kode_administrasi') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="jenis_masalah kendaraan">Jenis Masalah Kendaraan</label>
                            <input id="jenis_masalah kendaraan" class="form-control" type="text" name="jenis_masalah kendaraan"
                                value="{{ $mekanik->jenis_masalah kendaraan ?? old('jenis_masalah kendaraan') }}">
                            <span class="text-danger">{{ $errors->first('jenis_masalah kendaraan') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <select id="harga" class="form-control" name="harga">
                                @foreach ($list_sp as $a)
                                    <option value="{{ $a }}" @selected($a == $harga->harga)>{{ $a }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('harga') }}</span>
                        </div>

                        <div class="form-group">
                            <label for="metode_pembayaran">Metode pembayaran</label>
                            <input id="metode_pembayaran" class="form-control" type="text" name="metode_pembayaran"
                                value="{{ $mekanik->metode_pembayaran ?? old('metode_pembayaran') }}">
                            <span class="text-danger">{{ $errors->first('metode_pembayaran') }}</span>
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