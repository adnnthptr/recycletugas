@extends('layouts.pestkit')
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
                    <form action="{{ route('pelanggan_update', $pelanggan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Kode Pelanggan -->
                        <div class="form-group mb-3">
                            <label for="kode_pelanggan">Kode Pelanggan</label>
                            <input id="kode_pelanggan" class="form-control" type="text" name="kode_pelanggan"
                                value="{{ old('kode_pelanggan', $pelanggan->kode_pelanggan) }}">
                            @error('kode_pelanggan')
                                <span class="text-danger">{{ $kode_pelanggan }}</span>
                            @enderror
                        </div>

                        <!-- Nama Pelanggan -->
                        <div class="form-group mb-3">
                            <label for="nama_pelanggan">Nama Pelanggan</label>
                            <input id="nama_pelanggan" class="form-control" type="text" name="nama_pelanggan"
                                value="{{ old('nama_pelanggan', $pelanggan->nama_pelanggan) }}">
                            @error('nama_pelanggan')
                                <span class="text-danger">{{ $nama_pelanggan }}</span>
                            @enderror
                        </div>

                        <!-- Kendaraan -->
                        <div class="form-group mb-3">
                            <label for="kendaraan">Kendaraan</label>
                            <select id="kendaraan" class="form-control" name="kendaraan">
                                @foreach ($list_sp as $a)
                                    <option value="{{ $a }}" @selected($a == $pelanggan->kendaraan)>{{ $a }}</option>
                                @endforeach
                            </select>
                            @error('kendaraan')
                                <span class="text-danger">{{ $kendaraan }}</span>
                            @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div class="form-group mb-3">
                            <label for="no_hp">Nomor HP</label>
                            <input id="no_hp" class="form-control" type="text" name="no_hp"
                                value="{{ old('no_hp', $pelanggan->no_hp) }}">
                            @error('no_hp')
                                <span class="text-danger">{{ $no_hp }}</span>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" class="form-control" type="text" name="alamat"
                                value="{{ old('alamat', $pelanggan->alamat) }}">
                            @error('alamat')
                                <span class="text-danger">{{ $alamat }}</span>
                            @enderror
                        </div>

                        <!-- Tombol Submit -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div> <!-- End card-body -->
            </div> <!-- End card -->
        </div> <!-- End col-md-8 -->
    </div> <!-- End row -->
</div> <!-- End container -->
@endsection
