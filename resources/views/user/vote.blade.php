@extends('layouts.user.base')

@section('content')

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pb-1">
        <div class="container">
            <div class="row flex-center">
                <div class="col-12 mt-5 text-center">
                    <h1 class="fw-medium" style="text-transform:uppercase;">Silahkan Pilih Calon Ketua OSIS</h1>
                </div>
            </div>
        </div>
        <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-4">
        <div class="container">
            <div class="row justify-content-evenly">
                @foreach ($kandidat as $item)
                <div class="col-md-3 col-sm-12 card text-center py-5 border-0 shadow-sm">
                    <div class="card-header bg-primary text-white fw-bold">{{ $item->id < 10 ? '0'.$item->id : $item->id }}</div>
                    <img src="{{ asset('images') .'/'. $item->photo }}" class="img-fluid mt-4" alt="photo-kandidat">
                    <div class="card-body">
                        <h5>{{ $item->name }}</h5>
                        <div class="row">
                            <a href="#" class="col-12 btn btn-primary rounded-3 btn-block mt-2" data-bs-toggle="modal" data-bs-target="#vote-{{ $item->id < 10 ? '0'.$item->id : $item->id }}">Vote</a>
                            <a href="#" class="col-12 btn btn-outline-primary rounded-3 btn-block mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop-{{ $item->id < 10 ? '0'.$item->id : $item->id }}">Lihat Detail</a>

                            <!-- Modal Vote -->
                            <div class="modal fade" id="vote-{{ $item->id < 10 ? '0'.$item->id : $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h3 class="modal-title mb-4" id="staticBackdropLabel">Apakah Anda Yakin?</h3>
                                            <form action="{{ route('frontend.votePost') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $item->id }}">
                                                <input type="hidden" name="lat" value="">
                                                <input type="hidden" name="long" value="">
                                                <div class="row justify-content-evenly">
                                                    <button type="submit" class="col-md-5 rounded-3 btn btn-primary mr-2" style="padding: 12px 5px;">Ya, lanjut memilih</button>
                                                    <button type="button" class="col-md-5 rounded-3 btn btn-outline-danger ml-2" data-bs-dismiss="modal" style="padding: 12px 5px;">Tidak, ada perubahan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Detail -->
                            <div class="modal fade" id="staticBackdrop-{{ $item->id < 10 ? '0'.$item->id : $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="staticBackdropLabel">Detail Kandidat</h3>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img src="{{ asset('images') .'/'. $item->photo }}" class="img-fluid rounded-start" alt="photo-kandidat">
                                                </div>
                                                <div class="col-md-9 text-start">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="col-4">Nama Lengkap</th>
                                                                <th scope="col-8">{{ $item->name }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col-4">Nomor Urut</th>
                                                                <th scope="col-8">{{ $item->id < 10 ? '0'.$item->id : $item->id }}</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col-4">Visi</th>
                                                                <th scope="col-8">{!! $item->visi !!}</th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col-4">Misi</th>
                                                                <th scope="col-8">{!! $item->misi !!}</th>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

@endsection
