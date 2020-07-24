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
                                <div class="fh5co_latest_trading_date_and_name_color"> {{$item->media_massa}} - {{$item->updated_at->format('M d, Y')}}</div>
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
                                    <a href="{{route('news.detail',$item->id)}}" class="d-block fh5co_small_post_heading"><span class="">{{$item->title}}</span></a>
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
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video" width="100%" height="200"
                                            src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                    <img src="images/ariel-lustre-208615.jpg" alt=""/>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide" id="play-video">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 funniest videos on YouTube </span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_2" width="100%" height="200"
                                            src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_2">
                                    <img src="images/39-324x235.jpg" alt=""/></div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_2" id="play-video_2">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 embedded YouTube videos this month</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_3" width="100%" height="200"
                                            src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_3">
                                    <img src="images/joe-gardner-75333.jpg" alt=""/></div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_3" id="play-video_3">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                <span class="">The top 10 best computer speakers in the market</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img">
                                    <iframe id="video_4" width="100%" height="200"
                                            src="https://www.youtube.com/embed/aM9g4r9QUsM?rel=0&amp;showinfo=0"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide_4">
                                    <img src="images/vil-son-35490.jpg" alt=""/>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide_4" id="play-video_4">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2">
                                <a href="#" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <span class="">The top 10 best computer speakers in the market</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> Oct 16,2017</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection