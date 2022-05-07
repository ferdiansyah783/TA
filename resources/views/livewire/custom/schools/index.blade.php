<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="input-group mb-2"><input wire:model='search' class="form-control" type="text"
                    placeholder="Cari data sekolah..."><button class="btn btn-primary" type="button"><i
                        class="fas fa-search"></i></button></div>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>no</th>
                            <th>nama sekolah</th>
                            <th>status</th>
                            <th>jurusan</th>
                            <th>alamat</th>
                            <th>kontak</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->count() > 0)
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post['name'] }}</td>
                                    <td>{{ $post['status'] }}</td>
                                    <td>{{ $post['major'] }}</td>
                                    <td>{{ $post['address'] }}</td>
                                    <td>{{ $post['phone'] }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center text-black-50" colspan="6">Data Tidak Ditemukan</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            {{ $posts->links() }}
        </div>
    </div>
</div>
