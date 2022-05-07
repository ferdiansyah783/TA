<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{ $title ?? 'SMK GO' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('custom.assets.styles')
</head>
