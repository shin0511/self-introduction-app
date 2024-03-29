<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script>
        window.addEventListener('pageshow',()=>{
	if(window.performance.navigation.type==2) location.reload();
    });
    </script>
    <!--Style-->
    <link href="{{secure_asset('/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
</head>
<body>
    <div id="app">
        @include('layouts.header')

        <main class="py-4" >
            @yield('content')
        </main>

        @include('layouts.footer')
    </div>
</body>
</html>
