<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name', 'PM')}}</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{asset('js/table.js')}}"></script>


    @include('layout.design')


</head>
<header>
    @include('inc.navbar')


</header>
<body>
<div class="flex-center position-ref full-height">


</div>

@yield('content')

</body>

@include('layout.js')

</html>
