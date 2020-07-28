<div class="container-fluid fh5co_footer_bg pb-3">
    <div class="container animate-box">
        <div class="row">
            <div class="col-12 spdp_right py-5"><img src="{{asset('asset-news/images/white_logo.png')}}" alt="img" class="footer_logo"/></div>
            <div class="clearfix"></div>
            <div class="col-12 col-md-4 col-lg-3">
                <div class="footer_main_title py-3"> Tentang</div>
                <div class="footer_sub_about pb-3"> Website <b>Koran</b> Di Bangun Atas Dasar Penyedia Pelayanan Informasi Yang <b>independent</b> Demi Mewujudkan Berjalannya <b>Demokrasi</b> sebagai Jendela Informasi 
                </div>
                <div class="footer_mediya_icon">
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-linkedin"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-google-plus"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-twitter"></i></div>
                    </a></div>
                    <div class="text-center d-inline-block"><a class="fh5co_display_table_footer">
                        <div class="fh5co_verticle_middle"><i class="fa fa-facebook"></i></div>
                    </a></div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-lg-2">
                <div class="footer_main_title py-3"> Kategori</div>
                <ul class="footer_menu">
                    <?php
                        $category = App\category::limit(6)->get();
                    ?>
                    @foreach ($category as $item)
                        <li><a href="{{route('category.filter',$item->id)}}" class=""><i class="fa fa-angle-right"></i>&nbsp;&nbsp; {{$item->NamaKategori}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-md-5 col-lg-3 position_footer_relative">
                <?php
                    $populer = App\news::limit(3)->where('file-type','gambar')->orderby('viewer','desc')->get();
                ?>
                <div class="footer_main_title py-3"> Terpopuler</div>
                @foreach ($populer as $item)
                    <div class="footer_makes_sub_font">{{$item->updated_at->format('F d, Y')}}</div>
                    <a href="{{route('news.detail',$item->id)}}" class="footer_post pb-4 fa fa-angle-right">&nbsp;{{$item->title}}</a>
                @endforeach
            </div>
            <div class="col-12 col-md-12 col-lg-4 ">
                <div class="footer_main_title py-3"> Berita Terbaru</div>
                @foreach ($terbaru as $item)
                    <a href="{{route('news.detail',$item->id)}}" class="footer_img_post_6"><img src="{{asset($item->file)}}" alt="img"/></a>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center pt-2 pb-4">
            <div class="col-12 col-md-8 col-lg-7 ">
                <div class="input-group">
                    <span class="input-group-addon fh5co_footer_text_box" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control fh5co_footer_text_box" placeholder="Masukan email Anda..." aria-describedby="basic-addon1">
                    <a href="#" class="input-group-addon fh5co_footer_subcribe" id="basic-addon12"> <i class="fa fa-paper-plane-o"></i>&nbsp;&nbsp;Berlangganan</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid fh5co_footer_right_reserved">
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 py-4 Reserved"> © 2020 <a href="" title="KORAN">KORAN</a>. Ruang Demokrasi. </div>
        </div>
    </div>
</div>