@extends('admin/layouts/app')

@section('content')
    <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="card-title"><b>List Berita</b></h3>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-success" onclick="formtambah()" data-toggle='modal' data-target='#exampleModal'><i class="tim-icons icon-paper"></i>&nbsp;Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="listberita" width='100%'>
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Title
                                        </th>
                                        <th>
                                            Media
                                        </th>
                                        <th>
                                            Editor
                                        </th>
                                        <th>
                                            Viewer
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog"  style="top:-115px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id='form-template'>
                    {{csrf_field()}}{{method_field('post')}}
                    <div class="modal-body">
                            <input type="hidden" name='id' id="id">
                            <div class="form-group">
                                <label for="">Judul</label>
                                <input type="text" name='title' id='title' class="form-control @error('title') is-invalid @enderror" style='color:black;'>
                                @error('title')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Media</label>
                                <select name="media_id" id="media" class="form-control @error('media') is-invalid @enderror" style='color:black;'>
                                    <option value="" selected>-Pilih Media-</option>
                                    @foreach ($data_media as $item)
                                        <option value="{{$item->id}}" data-value='{{$item->NamaMedia}}'>{{$item->NamaMedia}}</option>
                                    @endforeach
                                </select>
                                @error('media')
                                    {{$message}}
                                @enderror
                            </div>                
                            <div class="form-group">
                                <label for="">editor</label>
                                <input type="text" name="editor" id='editor' class="form-control @error('editor') is-invalid @enderror" style='color:black;'>
                                @error('editor')
                                    {{$message}}
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="category_id" id="kategori_id" class="form-control @error('category_id') is-invalid @enderror" style='color:black;'>
                                    <option value="" selected>-Pilih Kategori-</option>
                                    @foreach ($data_category as $item)
                                        <option value="{{$item->id}}" data-value='{{$item->NamaKategori}}'>{{$item->NamaKategori}}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    {{$message}}
                                @enderror
                            </div>    
                            <div class="form-group">
                                <label for="">Content Berita</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" cols="30" rows="20" style='color:black;border-radius:5px;border:#2b3553 solid 1px;'></textarea>
                                @error('content')
                                    {{$message}}
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label for="">Tag</label><br>
                                <select name="tag[]" id="tags" class="selecttag form-control @error('tag') is-invalid @enderror" placeholder='Isi Tag' style='color:black;width:100%;' multiple>
                                    @foreach ($data_tag as $item)
                                        <option value="{{$item->id}}" style='color:black;' data-value='{{$item->NamaTag}}'>{{$item->NamaTag}}</option>
                                    @endforeach
                                </select>
                                @error('tag')
                                    {{$message}}
                                @enderror
                            </div>
                            <br>      
                            <div class="form-group">
                                <label for="">Type File</label>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="file-type" value="gambar" id="option1" autocomplete="off" onchange="gambar_func();" required> Gambar
                                    </label>
                                    <label class="btn btn-secondary">
                                        <input type="radio" name="file-type" value="video" id="option2" autocomplete="off" onchange="video_func();" required> Video
                                    </label>
                                </div>
                            </div>     
                            <div class="form-group" id="bagian_gambar" style="display:none;">
                                <a href="" id="linkgambarlama" target="_blank" style="color:black;text-decoration:none;"><label for="" id="infogambarlama"></label></a>
                                <input type="hidden" class='form-control @error('file') is-invalid @enderror' name="gambar" id="gambar" style='opacity:100%;position: static;color:black;'>
                                @error('file')
                                    {{$message}}
                                @enderror
                            </div> 
                            <div class="form-group" id="bagian_video" style="display:none;">
                                <label for="">Contoh Url Youtube</label>
                                <img src="{{asset('asset-admin/assets/img/contoh-upload.png')}}" width="100%" height="70px" alt="Contoh Upload File">
                                <small>Masukan Huruf Yang Di Tandai Ke Form Input (contoh)</small>
                                <input type="hidden" class='form-control @error('file') is-invalid @enderror' name="video" id="video" style='opacity:100%;position: static;color:black;' placeholder="Isi ID Youtube anda">
                                @error('file')
                                    {{$message}}
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type='submit' class="btn btn-primary" id="modal-button">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let gambar_func = () =>{
            $('#option1').attr('checked', true);
            $('#option2').attr('checked', false);
            $('#gambar').attr('type','file');
            $('#video').attr('type','hidden');
            $('#gambar').attr('required',true);
            $('#video').attr('required',false);
            $('#bagian_gambar').attr('style','display:block');
            $('#bagian_video').attr('style','display:none');
        }

        let video_func = () =>{
            $('#option1').attr('checked', true);
            $('#option2').attr('checked', false);
            $('#gambar').attr('type','hidden');
            $('#video').attr('type','text');
            $('#gambar').attr('required',false);
            $('#video').attr('required',true);
            $('#bagian_gambar').attr('style','display:none');
            $('#bagian_video').attr('style','display:block');
        }
    </script>
@endsection

@push('datatables_ajax')
    <script>
        let table = $('#listberita').DataTable({
            processing : true,
            serverSide : true,
            ajax : {
                url : "{{route('admin.list_berita_api')}}",
                type : "GET"
            },
            columns : [
                {
                    name : 'id',
                    data : 'id'
                },
                {
                    name : 'title',
                    data : 'title'
                },
                {
                    name : "media.NamaMedia",
                    data : "media.NamaMedia"
                },
                {
                    name : 'editor',
                    data : 'editor'
                },
                {
                    name : 'viewer',
                    data : 'viewer'
                },
                {
                    name : 'tombol_aksi',
                    data : 'tombol_aksi'
                }
            ],
            order : [[0,'asc']]
        });

        const formtambah = () =>{
            save_method = 'add';
            $('#form-template')[0].reset();
            $('#modal-title').text('Form Tambah Berita');
            $('#modal-button').text('Tambah');
            $('#linkgambarlama').attr('href','');
            $('#infogambarlama').text('');
        }

        // form edit
        const editberita = (sam) =>{
            save_method = 'edit';
            $('#form-template')[0].reset();
            $('input[name=_method]').val('PATCH');
            $('#modal-title').text('Form Edit Berita');
            $('#modal-button').text('Edit');
            $.ajax({
                url:"{{url('admin/list_berita/edit').'/'}}"+sam,
                type : 'get',
                dataType :'JSON',
                success:function(data){
                    let tampung_tag = new Array();
                    $('#id').val(data.id);
                    $('#title').val(data.title);
                    $("#media option[data-value='" + data.media.NamaMedia +"']").attr("selected","selected");
                    $('#editor').val(data.editor);
                    $("#kategori_id option[data-value='" + data.category.NamaKategori +"']").attr("selected","selected");
                    $('#content').val(data.content);
                    
                    // tag
                    for (let index = 0; index < data.tag.length; index++) {
                        tampung_tag[index] = data.tag[index].id;
                    }
                    $('#tags').val(tampung_tag); // Select the option with a value of '1'
                    $('#tags').trigger('change'); // Notify any JS components that the value changed
                    // tutup tag

                    // console.log(data['file-type']);
                    if (data['file-type'] == 'gambar') {
                        gambar_func();
                        // $('#gambar').val(data.file);
                        $('#linkgambarlama').attr('href','http://127.0.0.1:8000/storage/'+ data.file);
                        $('#infogambarlama').text('GAMBAR LAMA : '+data.title);
                    }else{
                        video_func();
                        $('#video').val(data.file);
                    }
                },
                error : function(){
                    alert('get Data Failed');
                }
            });
        }

        // processing tambah dan edit
        $(function(){
            $('#form-template').on('submit',function(e){
                if (!e.isDefaultPrevented()) {
                    let sampleID = $('#id').val();

                    if (save_method == 'add')url = "{{url('admin/list_berita/tambah')}}";
                    else url = "{{url('admin/list_berita/prosesedit').'/'}}"+sampleID;

                    $.ajax({
                        url : url,
                        type : 'POST',
                        data : new FormData($('#form-template')[0]),
                        contentType:false,
                        processData:false,
                        success: function($data){
                            table.ajax.reload();
                            $('#exampleModal').modal('hide');
                            iziToast.success({
                                title: 'Berhasil',
                                message: 'Berita Baru Berhasil Di Simpan',
                            });
                        },
                        error : function(e){
                            iziToast.error({
                                title: 'Gagal',
                                message: 'Pastikan Semua Form Sudah Terisi',
                            });
                        }
                    });
                    return false;
                }
            });
        });

        // hapus
        const hapusberita = (sam) =>{
            let csrf_token = $("meta[name='csrf_token']").attr('content');
            swal({
                title: "Kamu Yakin Ingin Menghapusnya ??",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "{{url('admin/list_berita/hapus').'/'}}"+sam,
                        type : 'post',
                        data : {'_method':'DELETE','_token':csrf_token},
                        success : function(){
                            swal("Hapus Berita Berhasil", {
                            icon: "success",
                            });
                            table.ajax.reload();
                        },
                        error : function(){
                            swal("Oops Something Error", {
                            icon: "error",
                            });
                        }
                    });
                }else{
                    swal("Berita Tidak Di Hapus");
                }
            });
        }
    </script>
@endpush