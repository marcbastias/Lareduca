@extends('layouts.music-task')

@section('title', 'Music Task')

@section('styles')
    <link rel="icon" type="image/svg+xml" href="{{ asset('vite.svg') }}" />
    <link rel="stylesheet" crossorigin href="{{ asset('drag-and-drop/assets/index-BFUoY_fS.css') }}">
@endsection
mix.copyDirectory('resources/js/dist', 'public/drag-and-drop');


@section('content')
    <div id="root"></div>
@endsection

@section('scripts')
    <script type="module" crossorigin src="{{ asset('drag-and-drop/assets/index-nhjvX8rx.js') }}"></script>
@endsection
