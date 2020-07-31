@extends('news/layouts/app')

@section('content')
    @if ($detail['file-type'] =='gambar')
        <div>
            <div id="fh5co-title-box" style="background-image: url('{{asset('storage/'.$detail->file)}}'); background-position: 50% 90.5px;" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
                <div class="page-title">
                    <img src="{{asset($detail->media->logo)}}" alt="Logo">
                    <span>{{$detail->media->NamaMedia}}<br>{{$detail->updated_at->format('F d, Y')}}</span>
                    <h2>{{$detail->title}}</h2>
                </div>
            </div>
        </div>
    @endif
    <div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
        <div class="container paddding">
            @if ($detail['file-type'] == 'video')
                <div class='row'>
                    <div class="col-md-12">
                        <div class='mb-4'>
                            <h2>{{$detail->title}}</h2>
                        </div>
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_hover_news_img_video_tag_position_relative">
                                <div class="fh5co_news_img" style="height:500px !important;">
                                    <iframe id="video" width="100%" height="100%"
                                            src="https://www.youtube.com/embed/{{$detail->file}}?rel=0&amp;showinfo=0"
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute fh5co_hide">
                                    <img src="https://www.youtube.com/embed/{{$detail->file}}?rel=0&amp;showinfo=0" alt=""/>
                                </div>
                                <div class="fh5co_hover_news_img_video_tag_position_absolute_1 fh5co_hide" style='top: 43%;right: 48%;' id="play-video">
                                    <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button_1">
                                        <div class="fh5co_hover_news_img_video_tag_position_absolute_1_play_button">
                                            <span><i class="fa fa-play"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row mx-0 mt-3">
                <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                    @if ($detail['file-type'] == 'video')
                        <div class="d-flex justify-content-left">
                            <div>
                                <img style='border-radius:40px;width:45px;' src="{{asset('storage/'.$detail->media->logo)}}" alt="Logo">
                            </div>
                            <div class='ml-2'>
                                <div>
                                    <strong>{{$detail->media->NamaMedia}}</strong>
                                </div>
                                <div>
                                    <small>{{$detail->updated_at->format('F d, Y')}}</small>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class='mt-3 mb-2'>
                        <a href="{{route('category.filter',$detail->category_id)}}" class="fh5co_tagg" style='border-radius: 50px;padding: 3px 8px;'>
                            <small>{{$detail->category->NamaKategori}}</small>
                        </a>
                    </div>
                    {!!$detail->content!!}
                    <div class='mt-4'>
                        <div>
                            Editor : <b>{{$detail->editor}}</b>
                        </div>
                        <div>
                            <b><i class="fa fa-tags"></i>Tag</b> : 
                            @foreach ($detail->tag as $item)
                            <a href="{{route('tag.filter',$item->id)}}" class="fh5co_tagg" style='padding:5px;border-radius: 25px;'>
                                    <small>{{$item->NamaTag}}</small>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tag</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @foreach ($all_tag as $item)
                            <a href="{{route('tag.filter',$item->id)}}" class="fh5co_tagg">{{$item->NamaTag}}</a>
                        @endforeach
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Terbaru</div>
                    </div>
                    @foreach ($terbaru as $item)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{asset('storage/'.$item->file)}}" alt="img" class="fh5co_most_trading"/>
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
                            <div class="pt-2">
                                <a style='text-decoration:none;' href="{{route('news.detail',$item->id)}}" class="d-block fh5co_small_post_heading fh5co_small_post_heading_1">
                                    <div>
                                        <span style='color:black;'><small>{{$item->media->NamaMedia}}</small></span>
                                    </div>
                                    <span style='color:black;'>{{Str::limit($item->title,35)}}</span>
                                    <div class="c_g"><i class="fa fa-clock-o"></i> {{$item->created_at->format('F d,Y')}}</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                        <i class="fa fa-search">&nbsp;Video Tidak Tersedia</i>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    {{-- trending --}}
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Trending</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @foreach ($populer as $item)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{asset('storage/'.$item->file)}}" alt=""/></div>
                            <div>
                                <div>
                                    <span style='color:black;'><small>{{$item->media->NamaMedia}}</small></span>
                                </div>
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