<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name='csrf_token'content='{{csrf_token()}}'>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    {{'KORAN | Ruang Demokrasi'}}
  </title>
  {{--  css & js  --}}
  @include('admin/layouts/particals/include-header')
</head>

<body class="">
  <div class="wrapper">
    @include('admin/layouts/particals/sidebar')
    <div class="main-panel">
        @include('admin/layouts/particals/navbar')
      <div class="content">
        @yield('content')
      </div>
      @include('admin/layouts/particals/footer')
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Support Official</li>
        <br><br>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
        </li>
      </ul>
    </div>
  </div>

  {{--  js  --}}
  @include('admin/layouts/particals/include-body')
</body>

</html>