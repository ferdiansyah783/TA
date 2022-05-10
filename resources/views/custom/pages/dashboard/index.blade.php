@extends('layouts.custom', [
'disabled_hero' => true,
])

@section('content')
    <section class="py-4 py-xl-5">
        <div class="container h-100" style="margin-top: 9rem;min-height: 40rem;">
            <div class="row h-100">
                <div
                    class="col-md-10 col-xl-8 text-center d-flex d-sm-flex d-md-flex justify-content-center align-items-center mx-auto justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div>
                        <h2 class="text-uppercase fw-bold mb-3">Halo {{ Auth::user()->name }}!</h2>
                        <p class="mb-4">Etiam a rutrum, mauris lectus aptent convallis. Fusce vulputate aliquam,
                            sagittis odio metus. Nulla porttitor vivamus viverra laoreet, aliquam netus.</p>

                        <a class="btn btn-primary fs-5 me-2 py-2 px-4" href="{{ route('sekolah.index') }}"
                            role="button">Manage Sekolah</a>

                        <a class="btn btn-outline-primary fs-5 py-2 px-4" href="{{ route('sekolah.index') }}"
                            role="button">Manage Jurusan</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
