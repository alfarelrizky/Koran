    @isset($data_jumbotron)
        <?php $angka = 0; ?>
        @foreach ($data_jumbotron as $item)
            <?php
            $id[$angka] = $item->id;
            $media[$angka] = $item->media->NamaMedia;
            $title[$angka] = $item->title;
            $file[$angka] = 'storage/'.$item->file;
            $lupdate[$angka] = $item->updated_at->format('M d, Y'); 
            $angka++;
            ?>
        @endforeach
    @else
        <?php
            $title[0] = '-';
            $media[0] = '-';
            $file[0] = 'asset-news/images/default.jpg';
            $lupdate[0] = date('l, d F Y'); 
            $title[1] = '-';
            $media[1] = '-';
            $file[1] = 'asset-news/images/default.jpg';
            $lupdate[1] = date('l, d F Y'); 
            $title[2] = '-';
            $media[2] = '-';
            $file[2] = 'asset-news/images/default.jpg';
            $lupdate[2] = date('l, d F Y'); 
            $title[3] = '-';
            $media[3] = '-';
            $file[3] = 'asset-news/images/default.jpg';
            $lupdate[3] = date('l, d F Y'); 
            $title[4] = '-';
            $media[4] = '-';
            $file[4] = 'asset-news/images/default.jpg';
            $lupdate[4] = date('l, d F Y'); 
        ?>
    @endisset
    <div class="container-fluid paddding mb-5">
        <div class="row mx-0">
            <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
                <div class="fh5co_suceefh5co_height"><img src="{{asset($file[0])}}" alt="img"/>
                    <div class="fh5co_suceefh5co_height_position_absolute"></div>
                    <div class="fh5co_suceefh5co_height_position_absolute_font">
                        <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$lupdate[0]}}
                        </a></div>
                        <div class=""><a href="@isset($id[0]){{route('news.detail',$id[0])}} @else {{'#'}} @endisset" class="fh5co_good_font"> {{$title[0]}} </a></div>
                        <small>{{$media[0]}}</small>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{asset($file[1])}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$lupdate[0]}} </a></div>
                                <div class=""><a href="@isset($id[1]){{route('news.detail',$id[1])}} @else {{'#'}} @endisset" class="fh5co_good_font_2"> {{$title[1]}}</a></div>
                                <small>{{$media[0]}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{asset($file[2])}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$lupdate[2]}} </a></div>
                                <div class=""><a href="@isset($id[2]){{route('news.detail',$id[2])}} @else {{'#'}} @endisset" class="fh5co_good_font_2">{{$title[2]}}</a></div>
                                <small>{{$media[0]}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{asset($file[3])}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$lupdate[3]}} </a></div>
                                <div class=""><a href="@isset($id[3]){{route('news.detail',$id[3])}} @else {{'#'}} @endisset" class="fh5co_good_font_2"> {{$title[3]}} </a></div>
                                <small>{{$media[0]}}</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                        <div class="fh5co_suceefh5co_height_2"><img src="{{asset($file[4])}}" alt="img"/>
                            <div class="fh5co_suceefh5co_height_position_absolute"></div>
                            <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                                <div class=""><a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;{{$lupdate[4]}} </a></div>
                                <div class=""><a href="@isset($id[4]){{route('news.detail',$id[4])}} @else {{'#'}} @endisset" class="fh5co_good_font_2">{{$title[4]}}</a></div>
                                <small>{{$media[0]}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>