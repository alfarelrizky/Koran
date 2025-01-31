<div class="container-fluid fh5co_header_bg">
    <div class="container">
        <div class="row">
            <div class="col-12 fh5co_mediya_center"><a href="#" class="color_fff fh5co_mediya_setting"><i
                class="fa fa-clock-o"></i>&nbsp;&nbsp;&nbsp;<?php echo date('l, d F Y')?></a>
                <div class="d-inline-block fh5co_trading_posotion_relative">
                    <img src="{{asset('logo/logo-white.png')}}" alt="img" class="fh5co_logo_width"/>
                </div>
                <a href="#" class="color_fff fh5co_mediya_setting">Sarana Media Demokrasi Terpercaya</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 fh5co_padding_menu">
                <img src="{{asset('logo/logo.png')}}" alt="img" class="fh5co_logo_width"/>
            </div>
            <div class="col-12 col-md-9 align-self-center fh5co_mediya_right">
                <form action="{{route('news.search')}}" method='GET' class="text-center d-inline-block">
                    <div class="text-center d-inline-block mt-1">
                        <div class="fh5co_verticle_middle">
                                <input type="text" name='search'>
                        </div>
                    </div>
                    <div class="text-center d-inline-block">
                        <button class="fh5co_display_table" style="padding-left: 10px;">
                            <div class="fh5co_verticle_middle">
                                    <i class="fa fa-search"></i>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-faded fh5co_padd_mediya padding_786">
    <div class="container padding_786">
        <nav class="navbar navbar-toggleable-md navbar-light ">
            <button class="navbar-toggler navbar-toggler-right mt-3" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation"><span class="fa fa-bars"></span></button>
            <a class="navbar-brand" href="#"><img src="{{asset('logo/logo.png')}}" alt="img" class="mobile_logo_width"/></a> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{request()->is('news') ? 'active':''}}">
                        <a class="nav-link" style='margin:0px 5px !important;' href="{{route('news.index')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    @foreach ($list_category as $item)
                    <li class="nav-item {{request()->is('news/filtercategory/'.$item->id) ? 'active':''}}">
                        <a class="nav-link" style='margin:0px 5px !important;' href="{{route('category.filter',$item->id)}}">{{$item->NamaKategori}} <span class="sr-only">(current)</span></a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>