@extends('layouts.user.base')

@section('content')

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="pb-1" style="height:90vh;">
        <div class="container">
            <div class="row flex-center">
                <div class="col-12 mt-5 text-center">
                    <h1 class="fw-medium mt-10 mb-4">Harap Melihat Jadwal Voting!</h1>
                    <p class="fw-medium mb-4">{{ date('l, d F Y H:i', strtotime($jadwal->start)) ." - ". date('l, d F Y H:i', strtotime($jadwal->end)) }}</p>
                    <a class="btn btn-lg btn-danger hover-top" href="{{ route('frontend.perolehan_suara') }}">Lihat Perolehan Suara</a>
                </div>
            </div>
        </div>
        <!-- end of .container-->
    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

@endsection
