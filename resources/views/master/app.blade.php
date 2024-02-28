<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta name="viewport" content=" initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link href="https://fonts.googleapis.com/css2?family=Marhey:wght@500&family=Scheherazade+New&family=Tajawal&display=swap" rel="stylesheet">
     <link    rel="stylesheet" href="{{asset('styles/fontawesome-5/css/fontawesome-all.min.css')}}">
     <link rel="stylesheet" href="{{asset('styles/bootstrap4/bootstrap.min.css')}}">
     <link    rel="stylesheet" href="{{asset('styles/main.css')}}"
     @livewireStyles
    @livewireScripts
</head>
<body dir="rtl">
@yield('content')
<script src="{{asset('project/js/jquery-3.6.1.min.js')}}"></script>
<script src="{{asset('styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('project/js/page.js')}}"></script>

</body>
</html>