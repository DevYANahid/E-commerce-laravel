<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/invoice.css') }}" rel="stylesheet">
    <link href="{{ asset('client-assets/css/font-awesome.min.css') }}" rel="stylesheet">
    @yield('page-css')
</head>
<body>
<div class="container bootstrap snippets bootdeys">
    <div class="row">
        <div class="col-sm-12">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('client-assets/js/jQuery_v3.1.1.min.js') }}"></script>
<script src="{{ asset('client-assets/js/bootstrap.min.js') }}"></script>
@yield('pag-script')
</body>
</html>
