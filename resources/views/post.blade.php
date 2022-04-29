@extends('layouts.main')

@section('container')
<div class="container mt-4">
    <article>
        <h2>{{ $post['title'] }}</h2>
        <h5>{{ $post['status'] }}</h5>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente eos vel velit ipsa porro maiores molestiae nulla, tempore obcaecati assumenda asperiores earum similique, modi quibusdam est reiciendis sequi eius fuga.</p>
    </article>

    <a href="/posts">Back to Posts</a>
</div>

@endsection
