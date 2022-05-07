@include('custom.partials.head')

<body>
    @include('custom.partials.navbar')

    @if (!isset($disabled_hero))
        @include('custom.partials.hero')
    @endif

    @yield('content')
</body>

@include('custom.partials.footer')
@include('custom.assets.scripts')
