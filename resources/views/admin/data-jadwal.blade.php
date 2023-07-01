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
                    <button type="button" class="btn bg-gradient-danger btn-sm" onclick="location.href='{{ route('admin.data_kandidat.index') }}'"><i class="fa-sm fas fa-arrow-left"></i> Kembali</button>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.data_jadwal.update', $jadwal->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Jadwal Mulai">Jadwal Mulai</label>
                                <input type="datetime-local" name="jadwal_start" class="form-control" id="Jadwal Mulai" value="{{ date('Y-m-d\TH:i', strtotime($jadwal->start)) }}" required placeholder="Masukan Jadwal Mulai">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Jadwal Selesai">Jadwal Selesai</label>
                                <input type="datetime-local" name="jadwal_end" class="form-control" id="Jadwal Selesai" value="{{ date('Y-m-d\TH:i', strtotime($jadwal->end)) }}" required placeholder="Masukan Jadwal Selesai">
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
