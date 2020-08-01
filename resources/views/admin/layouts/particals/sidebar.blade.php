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
          @if (Auth::user()->level == 'admin')
              <li class="{{request()->is('admin/media') ? 'active ':''}}">
                <a href="{{route('admin.list_media')}}">
                  <i class="tim-icons icon-components"></i>
                  <p>List Media</p>
                </a>
              </li>
          @endif
          <li class="{{request()->is('admin/category_tag') ? 'active ':''}}">
            <a href="{{route('admin.category_tag')}}">
              <i class="tim-icons icon-tag"></i>
              <p>Category & Tag</p>
            </a>
          </li>
          @if (Auth::user()->level == 'admin')
            <li class="{{request()->is('admin/user') ? 'active ':''}}">
              <a href="{{route('admin.user')}}">
                <i class="tim-icons icon-single-02"></i>
                <p>User</p>
              </a>
            </li>
          @endif 
        </ul>
      </div>
    </div>