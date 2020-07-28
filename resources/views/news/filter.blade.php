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
                            @elseif(isset($pencarian))
                                Pencarian : <b>{{$pencarian}}</b>
                            @endif
                        </div>
                    </div>
                    @forelse ($data as $item)
                        <div class="row pb-4">
                            <div class="col-md-5">
                                <div class="fh5co_hover_news_img">
                                    <div class="fh5co_news_img"><img src="{{asset($item->file)}}" alt=""/></div>
                                    <div></div>
                                </div>
                            </div>
                            <div class="col-md-7 animate-box">
                                <div>
                                    <a href="{{route('news.detail',$item->id)}}" style="text-decoration:none;color:ca870d;" class="py-1"> {{$item->media_massa}}</a>
                                </div>
                                <a href="{{route('news.detail',$item->id)}}" style="text-decoration:none;" class="fh5co_magna py-2"> {{Str::limit($item->title,70)}}</a>
                                <div class="fh5co_consectetur mt-3"> {{Str::limit($item->content, 150)}}
                                </div>
                            </div>
                        </div>
                    @empty
                        <i class="fa fa-search"></i> &nbsp;Berita Tidak Di Temukan
                    @endforelse
                    {{$data->links()}}
                </div>
                <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="fh5co_tags_all">
                        @forelse ($all_tag as $item)
                            <a href="{{route('tag.filter',$item->id)}}" class="fh5co_tagg">{{$item->NamaTag}}</a>
                        @empty
                            <i class="fa fa-search"></i> &nbsp;Berita Tidak Di Temukan
                        @endforelse
                    </div>
                    <div>
                        <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Terbaru</div>
                    </div>
                    @forelse ($terbaru as $item)
                        <div class="row pb-3">
                            <div class="col-5 align-self-center">
                                <img src="{{asset($item->file)}}" alt="img" class="fh5co_most_trading"/>
                            </div>
                            <div class="col-7 paddding">
                                <div class="most_fh5co_treding_font"><a style='color:black;text-decoration:none;' href="{{route('news.detail',$item->id)}}">{{$item->title}}</a></div>
                                <div class="most_fh5co_treding_font_123"> {{$item->updated_at->format('F d, Y')}}</div>
                            </div>
                        </div>
                    @empty
                        <i class="fa fa-search"></i> &nbsp;Berita Tidak Di Temukan
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{--  Latest Video  --}}
    <div class="container-fluid fh5co_video_news_bg pb-4">
        <div class="container animate-box" data-animate-effect="fadeIn">
            <div>
                @if(isset($kategori))
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-black">Video Tentang <b>{{$kategori}}</b></div>
                @elseif(isset($tag))
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-black">Video Tentang <b>{{$tag}}</b></div>
                @elseif(isset($pencarian))
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-5 pb-2 mb-4  text-black">Video Tentang <b>{{$pencarian}}</b></div>
                @endif
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
    <div class="container-fluid pb-4 pt-5">
        <div class="container animate-box">
            <div>
                <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Populer</div>
            </div>
            <div class="owl-carousel owl-theme" id="slider2">
                @forelse ($populer as $item)
                    <div class="item px-2">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="{{asset($item->file)}}" alt=""/></div>
                            <div>
                                <a href="{{route('news.detail',$item->id)}}" class="d-block fh5co_small_post_heading"><span class="">{{$item->title}}</span></a>
                                <div class="c_g"><i class="fa fa-clock-o"></i> {{$item->updated_at->format('F d, Y')}}</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <i class="fa fa-search">&nbsp;Berita Tidak Di Temukan</i>
                @endforelse
            </div>
        </div>
    </div>
@endsection