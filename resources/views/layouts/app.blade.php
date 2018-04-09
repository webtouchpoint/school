<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Datepicker -->
    <link href="{{ asset('libs/datepicker/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/datatable/datatable.min.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
    
    <div id="app">
        @include('layouts.nav')

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('flash::message')   
                </div>      
            </div>      
        </div>

        @if(isset($vueView))
            <component is="{{ $vueView }}" inline-template>
        @endif
            <div>
                @yield('content')  
            </div>
        @if(isset($vueView))
            </component>
        @endif
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('libs/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('libs/datatable/datatable.min.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    @yield('scripts')
</body>
</html>
