
@extends('layouts.main')

@section('container')

    @foreach ($posts as $post)
        <div class="container mt-4">
            <article>
                <h2>
                    <a href="/posts/{{ $post['slug'] }}">{{ $post['title'] }}</a>
                </h2>
                <h5>{{ $post['status'] }}</h5>
                <b>{{ $post['alamat'] }}</b>
                <p>{{ $post['telp'] }}</p>
                <p>{{ $post['jurusan'] }}</p>
            </article>
        </div>
    @endforeach

@endsection
