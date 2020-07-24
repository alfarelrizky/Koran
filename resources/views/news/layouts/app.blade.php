
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>{{config('APP_NAME','KORAN | Ruang Demokrasi')}}</title>
    <link rel="shortcut icon" href="{{asset('logo/logo-simple-icon.png')}}" type="image/x-icon"/>

    @include('news/layouts/particals/include-header')
</head>
<body class='single'>
    @include('news/layouts/particals/navbar')
    @yield('jumbotron')

    @yield('content')

    @include('news/layouts/particals/footer')
    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
    </div>
    @include('news/layouts/particals/include-body')
</body>
</html>