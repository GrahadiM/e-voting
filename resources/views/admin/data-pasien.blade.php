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
                    <button type="button" class="btn bg-gradient-info btn-sm" onclick="location.href='{{ route('admin.data_pasien.create') }}'"><i class="fa-sm fas fa-plus"></i> Tambah Data</button>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Telpon</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pasien as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->nik }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->birthday }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->gender }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->father_name }}</td>
                                <td>{{ $item->mother_name }}</td>
                                <td>
                                    <button type="button" class="btn bg-gradient-primary btn-sm" onclick="location.href='{{ route('admin.data_pasien.edit', $item->id) }}'"><i class="fa-sm fas fa-pencil-alt"></i></button>
                                    <button type="submit" class="btn bg-gradient-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form').submit();"><i class="fa-sm fas fa-trash-alt"></i></button>
                                    <form id="delete-form" action="{{ route('admin.data_pasien.delete') }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama Dokter</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Jenis Kelamin</th>
                                <th>Nomor Telpon</th>
                                <th>Nama Ayah</th>
                                <th>Nama Ibu</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col-12 -->
    </div>
    <!-- /.row -->
@endsection
