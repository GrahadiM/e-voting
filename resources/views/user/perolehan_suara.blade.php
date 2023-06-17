@extends('layouts.user.base')

@section('content')

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pb-1 mb-4">
        <div class="container">
            <div class="row flex-center">
                <div class="col-12 mt-5 text-center">
                    <h3 class="fw-medium" style="text-transform:uppercase;">Hasil Perhitungan Suara Calon Ketua OSIS SMAN 5 Kota Tangerang</h3>
                </div>
            </div>
        </div>
        <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-4" style="height:65vh;">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nomor Urut</th>
                        <th scope="col">Nama Kandidat</th>
                        <th scope="col">Jumlah Suara</th>
                        <th scope="col">Grafik</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($kandidats as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->name }}</td>
                            <td>{{ $voting[$loop->iteration - 1] }}</td>
                            <td>
                                @if (!empty($total) && $total != NULL && $total > 0)
                                <div class="progress" role="progressbar" aria-label="Warning example" aria-valuenow="{{ number_format(($voting[$loop->iteration - 1] / $total) * 100)  }}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar text-bg-warning" style="width: {{ number_format(($voting[$loop->iteration - 1] / $total) * 100)  }}%">{{ number_format(($voting[$loop->iteration - 1] / $total) * 100)  }}%</div>
                                </div>
                                @else
                                0%
                                @endif
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
        <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

@endsection
