<section class="py-4 py-xl-5">
    <div class="container h-100" style="margin-top: 9rem;min-height: 40rem;">
        <div class="row">
            <div class="col">
                <a class="btn btn-primary mb-4" href="{{ route('jurusan.create') }}" role="button">Create Jurusan</a>
            </div>
        </div>
        <div class="row h-100">
            <div class="col">
                <div id="accordion-jurusan" class="accordion" role="tablist">
                    @foreach ($jurusan as $item)
                        <div class="accordion-item">
                            <h2 class="accordion-header" role="tab"><button class="accordion-button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#accordion-jurusan .item-{{ $item->id }}" aria-expanded="true"
                                    aria-controls="accordion-jurusan .item-{{ $item->id }}">{{ $item->name }}</button>
                            </h2>
                            <div class="accordion-collapse collapse item-{{ $item->id }}" role="tabpanel"
                                data-bs-parent="#accordion-jurusan">
                                <div class="accordion-body">
                                    <a class="me-2" href="{{ route('jurusan.edit', $item->slug) }}"><span
                                            class="badge bg-warning">Edit
                                            Jurusan</span></a>
                                    <a href="#"><span class="badge bg-danger">Hapus Jurusan</span></a>
                                    <div class="mt-4">
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
