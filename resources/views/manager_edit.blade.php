@extends('layouts.pestkit')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Data Manager
                </div>
                <div class="card-body">
                    <!-- Form menggunakan POST dengan method PUT -->
                    <form action="{{ route('manager_update', $manager->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="kode_manager">Kode Manager</label>
                            <input id="kode_manager" class="form-control" type="text" name="kode_manager"
                                value="{{ $manager->kode_manager ?? old('kode_manager') }}">
                            <span class="text-danger">{{ $errors->first('kode_manager') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_manager">Nama Manager</label>
                            <input id="nama_manager" class="form-control" type="text" name="nama_manager"
                                value="{{ $manager->nama_manager ?? old('nama_manager') }}">
                            <span class="text-danger">{{ $errors->first('nama_manager') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="tugas_manager">Tugas Manager</label>
                            <select id="tugas_manager" class="form-control" name="tugas_manager">
                                @foreach ($list_sp as $a)
                                    <option value="{{ $a }}" @selected($a == $manager->tugas_manager)>{{ $a }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('tugas_manager') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="no_hp">Nomor HP</label>
                            <input id="no_hp" class="form-control" type="text" name="no_hp"
                                value="{{ $manager->no_hp ?? old('no_hp') }}">
                            <span class="text-danger">{{ $errors->first('no_hp') }}</span>
                        </div>

                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <input id="alamat" class="form-control" type="text" name="alamat"
                                value="{{ $manager->alamat ?? old('alamat') }}">
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
