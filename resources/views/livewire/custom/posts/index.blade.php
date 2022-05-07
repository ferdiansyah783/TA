<div class="container" style="margin-top: 9rem;min-height: 40rem;">

    <div class="row">
        <div class="col">
            <div class="input-group"><input wire:model='search' class="form-control" type="text"
                    placeholder="Search..." /><button class="btn btn-primary" type="button"><i
                        class="fas fa-search"></i></button>
            </div>

            {{-- Show element if search is updated --}}
            @if (strlen($search) > 0)
                @if (count($posts) > 0)
                    <span class="text-success">*Menemukan <strong>{{ count($posts) }}</strong> hasil dari pencarian
                        dengan kata
                        kunci
                        <strong>{{ $search }}</strong></span>
                @else
                    <span class="text-danger">*Tidak ada hasil pencarian dengan kata
                        kunci
                        <strong>{{ $search }}</strong></span>
                @endif
            @endif

        </div>
    </div>


    <div class="row">
        <div class="col-xl-9 mt-3">


            @foreach ($posts as $post)
                <div class="row mt-2">
                    <div class="col"><img class="rounded img-fluid" width="100%" height="100%"
                            src="https://analyticsinsight.b-cdn.net/wp-content/uploads/2020/04/Robotics-1.jpg" /></div>
                    <div class="col"><span class="badge rounded-pill bg-info">Posted by: <a
                                href="{{ route('users.show', $post->user->username) }}"
                                class="text-light">{{ $post->user->name }}</a>
                            @if ($post->user->is_verified)
                                <i class="fas fa-check-circle"></i>
                            @endif at:
                            {{ $post->created_at }}
                        </span>
                        <h4 class="fw-bold">{{ $post->title }}</h4>
                        <p>{{ strip_tags(Str::words($post->content, 30)) }}<br /></p><a
                            class="small text-decoration-none" href="{{ route('posts.show', $post->slug) }}">read
                            more <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endforeach

            <div class="mt-3">
                {{ $posts->withQueryString()->links() }}
            </div>
        </div>

        <livewire:custom.tags.tags />
    </div>


    @section('script')
        <script>
            window.livewire.on('search', (search) => {
                window.livewire.emit('search', search);
            });
        </script>
    @endsection
</div>
