@extends('news/layouts/app')

@section('content')
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            <div class="row mx-0">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                            @if(isset($kategori))
                                Kategori : <b>{{$kategori}}</b>
                            @elseif(isset($tag))
                                Tag : <b>{{$tag}}</b>
                            @endif
                        </div>
                    </div>
                    @foreach ($data as $item)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{asset($item->file)}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <a href="{{route('news.detail',$item->id)}}" class="fh5co_magna py-2"> {{$item->title}}</a>
                                <div class="fh5co_consectetur mt-3"> {{Str::limit($item->content, 300)}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$data->links()}}
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        <a href="#" class="fh5co_tagg">Business</a>
                        <a href="#" class="fh5co_tagg">Technology</a>
                        <a href="#" class="fh5co_tagg">Sport</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                        <a href="#" class="fh5co_tagg">Photography</a>
                        <a href="#" class="fh5co_tagg">Lifestyle</a>
                        <a href="#" class="fh5co_tagg">Art</a>
                        <a href="#" class="fh5co_tagg">Education</a>
                        <a href="#" class="fh5co_tagg">Social</a>
                        <a href="#" class="fh5co_tagg">Three</a>
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Terbaru</div>
                    </div>
                    @foreach ($terbaru as $item)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{asset($item->file)}}" alt="img" class="fh5co_most_trading"/>
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font"><a style='color:black;text-decoration:none;' href="{{route('news.detail',$item->id)}}">{{$item->title}}</a></div>
                                <div class="most_fh5co_treding_font_123"> {{$item->updated_at->format('F d, Y')}}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach ($populer as $item)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{asset($item->file)}}" alt=""/></div>
                            <div>
                                <a href="{{route('news.detail',$item->id)}}" class="d-block fh5co_small_post_heading"><span class="">{{$item->title}}</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{$item->updated_at->format('F d, Y')}}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection