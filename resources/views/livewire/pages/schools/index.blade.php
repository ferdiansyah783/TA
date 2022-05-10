<div class="container" style="margin-top: 9rem;min-height: 40rem;">

    @auth
        <div class="row mb-3">
            <div class="col"><a class="btn btn-primary" href="{{ route('sekolah.create') }}" role="button"><i
                        class="far fa-plus-square"></i> Tambah Data
                    Sekolah</a></div>
        </div>
    @endauth



    <div class="row">
        <div class="col">
            <div class="input-group"><input class="form-control" type="text" wire:model='search'
                    placeholder="Search..." /><button class="btn btn-primary" type="button"><i
                        class="fas fa-search"></i></button></div>
            @if ($search)
                @if (count($schools) == 0)
                    <span class="text-danger">*Data dengan kata kunci <strong>{{ $search }}</strong> tidak
                        ditemukan!</span>
                @else
                    <span class="text-info">Menemukan <strong>{{ count($schools) }}</strong> hasil dari pencarian
                        dengan kata kunci
                        <strong>{{ $search }}</strong></span>
                @endif
            @endif
        </div>
    </div>



    <div class="row">
        <div class="col-xl-9 mt-3">


            @foreach ($schools as $school)
                <div class="row mt-2">
                    <div class="col"><img class="rounded img-fluid" width="100%" height="100%"
                            src="https://analyticsinsight.b-cdn.net/wp-content/uploads/2020/04/Robotics-1.jpg" /></div>
                    <div class="col"><span class="badge rounded-pill bg-info">Posted by: Ihsan Devs <i
                                class="fas fa-check-circle"></i></span>
                        <h4 class="fw-bold">{{ $school['name'] }}</h4>

                        <span class="badge bg-primary"><i class="far fa-thumbs-up"></i> 23 Likes</span>

                        @auth
                            <span class="badge bg-warning ms-1"><a class="text-decoration-none fw-bolder text-light"
                                    href="{{ route('sekolah.edit', $school['slug']) }}">Edit</a></span>

                            <span class="badge bg-danger ms-1"><a class="text-decoration-none fw-bolder text-light"
                                    href="javascript:void(0)"
                                    wire:click='delete("{{ $school['slug'] }}")'>Delete</a></span>
                        @endauth


                        {{-- Start address school --}}
                        <p class="mt-4">
                            <i class="fas fa-address-card"></i> <strong>Alamat: </strong>{{ $school['address'] }}

                            <br>

                            <i class="fas fa-phone"></i> <strong>Contact person:
                            </strong>{{ $school['phone'] }}

                            <br>

                            <i class="far fa-plus-square"></i> <strong>Created
                                at:</strong> {{ Carbon\Carbon::parse($school['created_at'])->diffForHumans() }}
                        </p>


                        <span class="badge bg-primary">Jurusan: </span>
                        <div class="row">
                            <div class="col">
                                @foreach ($school['jurusans'] as $jurusan)
                                    <span class="badge rounded-pill bg-success me-1"><a
                                            class="text-decoration-none fw-bolder text-light"
                                            href="{{ route('jurusan.show', $jurusan['slug']) }}">{{ $jurusan['name'] }}</a></span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



            <div class="row mt-3">
                <div class="col">
                    {{ $schools->links() }}
                </div>
            </div>
        </div>


        {{-- <div class="col mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Jurusan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another
                                    Tags</a></span><span class="badge bg-primary me-1"><a
                                    class="text-decoration-none fw-bolder text-light" href="#">Another Tags</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
