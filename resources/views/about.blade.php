@extends('layouts.main')

@section('container')
<div class="box mt-4 d-flex">
    <div class="box-1 shadow rounded">
        <img src="assets/images/rpl2.jpg" class="img-about" alt="">
        <h3>{{ $name[0] }}</h3>
        <p>Web Developer</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis voluptatibus velit vero quas repudiandae accusantium rem odit? Praesentium vero quaerat, accusamus necessitatibus officiis nesciunt quibusdam error mollitia exercitationem atque blanditiis assumenda impedit dolor dignissimos quos suscipit magnam accusantium aliquam! Inventore eos veritatis vitae in hic quas architecto a fugit veniam?</p>
    </div>
    <div class="box-2 shadow rounded">
        <img src="" class="gambar-about" alt="">
        <h3>{{ $name[1] }}</h3>
        <p>Web Developer</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis voluptatibus velit vero quas repudiandae accusantium rem odit? Praesentium vero quaerat, accusamus necessitatibus officiis nesciunt quibusdam error mollitia exercitationem atque blanditiis assumenda impedit dolor dignissimos quos suscipit magnam accusantium aliquam! Inventore eos veritatis vitae in hic quas architecto a fugit veniam?</p>
    </div>
    <div class="box-3 shadow rounded">
        <img src="" class="gambar-about" alt="">
        <h3>{{ $name[2] }}</h3>
        <p>Web Developer</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis voluptatibus velit vero quas repudiandae accusantium rem odit? Praesentium vero quaerat, accusamus necessitatibus officiis nesciunt quibusdam error mollitia exercitationem atque blanditiis assumenda impedit dolor dignissimos quos suscipit magnam accusantium aliquam! Inventore eos veritatis vitae in hic quas architecto a fugit veniam?</p>
    </div>
    <div class="box-4 shadow rounded">
        <img src="" class="gambar-about" alt="">
        <h3>{{ $name[3] }}</h3>
        <p>Web Developer</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quis voluptatibus velit vero quas repudiandae accusantium rem odit? Praesentium vero quaerat, accusamus necessitatibus officiis nesciunt quibusdam error mollitia exercitationem atque blanditiis assumenda impedit dolor dignissimos quos suscipit magnam accusantium aliquam! Inventore eos veritatis vitae in hic quas architecto a fugit veniam?</p>
    </div>
</div>
@endsection
