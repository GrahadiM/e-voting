@extends('layouts.dashboard.base')

@section('breadcrumb')
    <div class="col-sm-6">
        <h1 class="m-0">{{ $title }}</h1>
    </div>
    <!-- /.col -->
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </div>
    <!-- /.col -->
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn bg-gradient-danger btn-sm" onclick="location.href='{{ route('admin.data_pemilih.index') }}'"><i class="fa-sm fas fa-arrow-left"></i> Kembali</button>
                </div>
                <div class="card-body">
                    @if (!$edit)
                    <form action="{{ route('admin.data_pemilih.store') }}" method="POST">
                        @csrf
                    @else
                    <form action="{{ route('admin.data_pemilih.update', $pemilih->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                    @endif
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Nama">Nama</label>
                                <input type="text" name="name" class="form-control" id="Nama" value="{{ $edit ? $pemilih->name : '' }}" required placeholder="Masukan Nama">
                            </div>

                            @if (!$edit)
                            <div class="form-group col-md-6">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" class="form-control" id="email" value="{{ $edit ? $pemilih->email : '' }}" required placeholder="Masukan Email Address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required placeholder="Masukan Password">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required placeholder="Masukan Konfirmasi Password">
                            </div>
                            @endif

                            <div class="form-group col-md-6">
                                <label for="nisn">NISN</label>
                                <input type="number" name="nisn" class="form-control" id="nisn" value="{{ $edit ? $pemilih->nisn : '' }}" required placeholder="Masukan NISN">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" id="jurusan" value="{{ $edit ? $pemilih->jurusan : '' }}" required placeholder="Masukan Jurusan">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="kelas">Kelas</label>
                                <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $edit ? $pemilih->kelas : '' }}" required placeholder="Masukan Kelas">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Jenis Kelamin</label>
                                <select name="gender" class="form-control form-select" required>
                                    <option selected="selected" value="{{ $edit ? $pemilih->gender : '' }}">{{ $edit ? $pemilih->gender : 'Pilih Jenis Kelamin' }}</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.row -->
@endsection
