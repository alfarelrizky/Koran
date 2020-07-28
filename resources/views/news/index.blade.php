@extends('news/layouts/app')

@section('jumbotron')
    @include('news/layouts/particals/jumbotron')   
@endsection

@section('content')
    {{--  trending  --}}
    <div class="container-fluid pt-3">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme js" id="slider1">
                @foreach ($trending as $item)
                    <div class="item px-2">
                        <div class="fh5co_latest_trading_img_position_relative">
                            <div class="fh5co_latest_trading_img">
                                <img src="{{asset($item->file)}}" alt="" class="fh5co_img_special_relative"/>
                            </div>
                            <div class="fh5co_latest_trading_img_position_absolute"></div>
                            <div class="fh5co_latest_trading_img_position_absolute_1">
                                <a href="{{route('news.detail',$item->id)}}" class="text-white"> {{$item->title}}</a>
                                <div class="fh5co_latest_trading_date_and_name_color"> {{$item->media->NamaMedia}} - {{$item->updated_at->format('M d, Y')}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{--  terbaru  --}}
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Terbaru</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach ($terbaru as $item)
                    <div class="item px-2">
                            <div class="fh5co_hover_news_img">
                                <div class="fh5co_news_img"><img src="{{asset($item->file)}}" alt=""/></div>
                                <div>
                                    <small>{{$item->media->NamaMedia}}</small>
                                    <a href="{{route('news.detail',$item->id)}}" class="d-block fh5co_small_post_heading"><span style="color:black;">{{$item->title}}</span></a>
                                    <div class="c_g"><i class="fa fa-clock-o"></i> {{$item->created_at->format('M d, Y')}}</div>
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{--  Latest Video  --}}
    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-black">Latest Video</div>
            </div>
            <div>
                <div class="owl-carousel owl-theme" id="slider3">
                    <?php $angka = 0;?>
                    @forelse ($video as $item)
                    <?php $angka++;?>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="{{($angka==1)?'video':'video_'.$angka}}" width="100%" height="200"
                                            src="https://www.youtube.com/embed/{{$item->file}}?rel=0&amp;showinfo=0"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div>
                                    <img src="https://www.youtube.com/embed/{{$item->file}}?rel=0&amp;showinfo=0" alt=""/>
                                </div>
                            </div>
                            <small>{{$item->media->NamaMedia}}</small>
                            <a style='text-decoration:none;' href="{{route('news.detail',$item->id)}}" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span style='color:black;'>{{Str::limit($item->title,35)}}</span>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{$item->created_at->format('F d,Y')}}</div>
                            </a>
                        </div>
                    </div>
                    @empty
                        <i class="fa fa-search">&nbsp;Video Tidak Tersedia</i>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection