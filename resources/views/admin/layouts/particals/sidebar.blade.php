<div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="javascript:void(0)" class="simple-text logo-mini">
            <img src="{{asset('logo/logo-simple-navbar.png')}}" alt="img" class="fh5co_logo_width"/>
          </a>
          <a href="javascript:void(0)" class="simple-text logo-normal">
            List Menu
          </a>
        </div>
        <ul class="nav">
         {{--  {{request()}}  --}}
          <li class="{{request()->is('admin') ? 'active ':''}}">
            <a href="{{route('admin.index')}}">
              <i class="tim-icons icon-chart-pie-36"></i>
              <p>Dashboard Panel</p>
            </a>
          </li>
        </ul>
      </div>
    </div>