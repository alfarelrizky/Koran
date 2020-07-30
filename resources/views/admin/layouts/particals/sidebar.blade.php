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
          <li class="{{request()->is('admin/list_berita') ? 'active ':''}}">
            <a href="{{route('admin.list_berita')}}">
              <i class="tim-icons icon-atom"></i>
              <p>List Berita</p>
            </a>
          </li>
          <li class="{{request()->is('admin/list_media') ? 'active ':''}}">
            <a href="{{route('admin.list_media')}}">
              <i class="tim-icons icon-components"></i>
              <p>List Media</p>
            </a>
          </li>
        </ul>
      </div>
    </div>