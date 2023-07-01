@extends('layouts.user.base')

@section('content')

    <!-- ============================================-->
    <!-- <section> begin ============================-->
        <section class="pb-6">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-lg-6 col-md-5 order-md-1"><img class="img-fluid"
                            src="{{ asset('user') }}/assets/img/illustrations/1.png" alt="" /></div>
                    <div class="col-md-7 col-lg-6 mt-5 text-center text-md-start">
                        <h1 class="fw-medium">Sistem <span class="fw-bold">E-Voting</span> Pemilihan Ketua<br />OSIS Berbasis Website</h1>
                        <p class="mt-3 mb-4">
                            Selamat Datang Di Pemilihan <span class="fw-medium">Ketua OSIS SMAN 5 </span>Kota Tangerang.
                        </p>
                        <p class="mt-3 mb-4">
                            Jadwal Voting : <span class="fw-medium">{{ date('l, d F Y H:i', strtotime($jadwal->start)) ." - ". date('l, d F Y H:i', strtotime($jadwal->end)) }}</span>
                        </p>
                        <a class="btn btn-lg btn-danger hover-top" href="{{ route('frontend.vote') }}">Voting Sekarang</a>
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
                <div class="card py-5 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="border-end d-flex justify-content-md-center">
                                    <div class="mx-2 mx-md-0 me-md-5">
                                        <div class="badge badge-circle bg-soft-danger">
                                            <svg class="bi bi-person-fill" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="#F53838" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="fw-bolder text-1000 mb-0">{{ $pemilih }} </p>
                                        <p class="mb-0">Jumlah Pemilih </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="border-end d-flex justify-content-md-center">
                                    <div class="mx-2 mx-md-0 me-md-5">
                                        <div class="badge badge-circle bg-soft-danger">
                                            <svg class="bi bi-person-fill" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" fill="#F53838" viewBox="0 0 16 16">
                                                <path
                                                    d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="fw-bolder text-1000 mb-0">{{ $kandidat }} </p>
                                        <p class="mb-0">Jumlah Kandidat </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="d-flex justify-content-md-center">
                                    <div class="mx-2 mx-md-0 me-md-5">
                                        <div class="badge badge-circle bg-soft-danger">
                                            <svg class="bi bi-hdd-stack-fill" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" fill="#F53838" viewBox="0 0 16 16">
                                                <path
                                                    d="M2 9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zM2 2a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H2zm.5 3a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1zm2 0a.5.5 0 1 1 0-1 .5.5 0 0 1 0 1z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="fw-bolder text-1000 mb-0">{{ $vote }} </p>
                                        <p class="mb-0">Jumlah Suara </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="pt-4 pt-md-6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-5 col-lg-7 text-lg-center"><img class="img-fluid mb-5 mb-md-0"
                            src="{{ asset('user') }}/assets/img/illustrations/2.png" alt="" /></div>
                    <div class="col-md-7 col-lg-5 text-center text-md-start">
                        <h2>Cara Mengikuti Voting!</h2>
                        <p>
                            Pastikan kamu sudah memiliki akun dan terdaftar di sistem e-voting ini.
                            <br>Jika belum, silahkan hubungi admin.
                        </p>
                        <div class="d-flex">
                            <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="#2FAB73" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                </path>
                            </svg>
                            <p class="ms-2">Login</p>
                        </div>
                        <div class="d-flex">
                            <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="#2FAB73" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                </path>
                            </svg>
                            <p class="ms-2">Pilih Kandidat</p>
                        </div>
                        <div class="d-flex">
                            <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="#2FAB73" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                </path>
                            </svg>
                            <p class="ms-2">Klik Voting</p>
                        </div>
                        <div class="d-flex">
                            <svg class="bi bi-check-circle-fill" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="#2FAB73" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z">
                                </path>
                            </svg>
                            <p class="ms-2">Selesai</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of .container-->
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->

@endsection
