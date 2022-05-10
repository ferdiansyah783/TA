<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Blog</h2>
            <p class="w-lg-50">Bersama kami temukan jurusan SMK yang tepat sesuai minat dan bakatmu</p>
        </div>
    </div>


    <div class="row gy-4 row-cols-1 row-cols-md-2">

        {{-- @foreach ($posts as $post)
            <div class="col">
                <div class="d-flex flex-column flex-lg-row">
                    <div class="w-100"><img class="rounded img-fluid d-block w-100 fit-cover"
                            style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" />
                    </div>
                    <div class="py-4 py-lg-0 px-lg-4">
                        <h4>{{ $post['title'] }}</h4>
                        <span class="badge rounded-pill bg-success">Posted by: <a
                                href="{{ route('users.show', $post['user']['username']) }}"
                                class="text-light">{{ $post['user']['name'] }}</a> at:
                            {{ $post['created_at'] }}</span>
                        <p>{{ strip_tags(Str::words($post['content'], 30)) }}</p>
                        <a class="small text-decoration-none" href="{{ route('posts.show', $post['slug']) }}">read
                            more <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        @endforeach --}}

        <div class="col justify-content-center">
            <h1 class="heading">Ini data jurusan</h1>
        </div>
    </div>

    <div class="row justify-content-center align-items-center mt-4">
        <div class="col text-center"><a class="btn btn-info btn-sm" href="{{ route('sekolah.index') }}"
                role="button">Read
                more</a>
        </div>
    </div>
</div>
