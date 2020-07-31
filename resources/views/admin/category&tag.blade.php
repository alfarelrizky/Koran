@extends('admin/layouts/app')

@section('content')
    <div class="content">
        <div class="row">
            {{--  category  --}}
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="card-title"><b>List Category</b></h3>                            
                        </div>
                        <div>
                            <button class='btn btn-sm btn-success' onclick='tambahcategory();' data-toggle='modal' data-target='#formModal'><i class="tim-icons icon-paper"></i> &nbsp; Tambah</button>
                        </div>
                    </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter" id="templateTable">
                    <thead class="text-primary">
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Nama Category
                        </th>
                        <th>
                          Update Terakhir
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

          {{--  tag  --}}
          <div class="col-md-6">
            <div class="card ">
              <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="card-title"><b>List Tag</b></h3>                            
                        </div>
                        <div>
                            <button class='btn btn-sm btn-success' onclick='tambahtag();' data-toggle='modal' data-target='#formModalTag'><i class="tim-icons icon-paper"></i> &nbsp; Tambah</button>
                        </div>
                    </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table tablesorter" id="templateTableTag">
                    <thead class="text-primary">
                      <tr>
                        <th>
                          No
                        </th>
                        <th>
                          Nama Tag
                        </th>
                        <th>
                          Update Terakhir
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog"  style="top:-15px;" role="document">
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
                            <label for="">Nama Category</label>
                            <input type="text" name='NamaKategori' id='NamaKategori' class="form-control @error('NamaKategori') is-invalid @enderror" style='color:black;'>
                            @error('NamaKategori')
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
    {{--  modal Tag  --}}
    <div class="modal fade" id="formModalTag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog"  style="top:-15px;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-tag"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id='form-template-tag'>
                  {{csrf_field()}}{{method_field('post')}}
                    <div class="modal-body">
                        <input type="hidden" name='id' id="idtag">
                        <div class="form-group">
                            <label for="">Nama Tag</label>
                            <input type="text" name='NamaTag' id='NamaTag' class="form-control @error('NamaTag') is-invalid @enderror" style='color:black;'>
                            @error('NamaTag')
                                {{$message}}
                            @enderror
                        </div>   
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type='submit' class="btn btn-primary" id="modal-button-tag">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('datatables_ajax')
    <script>
        let table = $('#templateTable').DataTable({
            processing : true,
            serverSide : true,
            ajax :{
                url : "{{url('admin/category_api')}}",
                type : "get",
            },
            columns :[
                {
                    name : 'id',
                    data : 'id'
                },
                {
                    name : 'NamaKategori',
                    data : 'NamaKategori'
                },
                {
                    name : 'tanggal',
                    data : 'tanggal'
                },
                {
                    name : 'tombol_aksi',
                    data : 'tombol_aksi'
                }
            ],
            order : [[0,'asc']]
        });

        // tambah category
        const tambahcategory = () =>{
            save_method = 'add';
            $('#form-template')[0].reset();
            $('#modal-title').text('Form Tambah Kategori');
            $('#modal-button').text('Tambah');
        }

        // edit category
        const editcategory = (id) =>{
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#form-template')[0].reset();
            $('#modal-title').text('Form Edit Kategori');
            $('#modal-button').text('Edit');
            $.ajax({
                url : "{{url('admin/category_route_edit').'/'}}"+id,
                type : "GET",
                success : function(data){
                    $('#id').val(data.id);
                    $('#NamaKategori').val(data.NamaKategori);
                },
                error : function(){
                    alert('gagal');
                }
            });
        }

        const hapuscategory = (id) => {
            let token = $("meta[name='csrf_token']").attr('content');
            swal({
                title: "Yakin Ingin Menghapusnya?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "{{url('admin/category_hapus').'/'}}"+id,
                    type : 'post',
                    data : {'_method' : 'DELETE' , '_token' : token},
                    success : function(){
                        swal("Berhasil! Kategori Berhasil Di Hapus!", {
                            icon: "success",
                        });
                        table.ajax.reload();
                    },
                    error : function(){
                         swal("Gagal! Kategori Gagal Di Hapus!", {
                            icon: "error",
                        });
                    }
                });
            } else {
                swal("Kategori Tidak Di Hapus!");
            }
            });
        }
        // proses category dan tag
        $('#form-template').on('submit',function(e){
            if (!e.isDefaultPrevented()) {
                let id = $('#id').val();

                if (save_method == 'add') url = "{{url('admin/category_tambah')}}";
                else url = "{{url('admin/category_edit').'/'}}"+id;

                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#form-template').serialize(),
                    success : function(){
                        if (save_method == 'add') {
                            iziToast.success({
                                title: 'Berhasil',
                                message: 'Kategori Berhasil Di Tambahkan',
                            });
                        }else{
                            iziToast.success({
                                title: 'Berhasil',
                                message: 'Kategori Berhasil Di Edit',
                            });
                        }
                        table.ajax.reload();
                        $('#formModal').modal('hide');
                    },
                    error : function(){
                        if (save_method == 'add') {
                            iziToast.error({
                                title: 'Gagal',
                                message: 'Tambah Kategori Gagal, Coba Lagi',
                            });
                        }else{
                            iziToast.error({
                                title: 'Gagal',
                                message: 'Edit Media Kategori, Coba Lagi',
                            });
                        }
                        $('#formModal').modal('hide');
                    }
                });
                return false;
            }
        });


        // tag
        let tabletag = $('#templateTableTag').DataTable({
            processing : true,
            serverSide : true,
            ajax :{
                url : "{{url('admin/tag_api')}}",
                type : "get",
            },
            columns :[
                {
                    name : 'id',
                    data : 'id'
                },
                {
                    name : 'NamaTag',
                    data : 'NamaTag'
                },
                {
                    name : 'tanggal',
                    data : 'tanggal'
                },
                {
                    name : 'tombol_aksi',
                    data : 'tombol_aksi'
                }
            ],
            order : [[0,'asc']]
        });

        // tambah category
        const tambahtag = () =>{
            save_method = 'add';
            $('#form-template-tag')[0].reset();
            $('#modal-title-tag').text('Form Tambah Tag');
            $('#modal-button-tag').text('Tambah');
        }

        // edit category
        const edittag = (id) =>{
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#form-template-tag')[0].reset();
            $('#modal-title-tag').text('Form Edit Tag');
            $('#modal-button-tag').text('Edit');
            $.ajax({
                url : "{{url('admin/tag_route_edit').'/'}}"+id,
                type : "GET",
                success : function(data){
                    $('#idtag').val(data.id);
                    $('#NamaTag').val(data.NamaTag);
                },
                error : function(){
                    alert('gagal');
                }
            });
        }

        const hapustag = (id) => {
            let token = $("meta[name='csrf_token']").attr('content');
            swal({
                title: "Yakin Ingin Menghapusnya?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "{{url('admin/tag_hapus').'/'}}"+id,
                    type : 'post',
                    data : {'_method' : 'DELETE' , '_token' : token},
                    success : function(){
                        swal("Berhasil! Tag Berhasil Di Hapus!", {
                            icon: "success",
                        });
                        tabletag.ajax.reload();
                    },
                    error : function(){
                         swal("Gagal! Tag Gagal Di Hapus!", {
                            icon: "error",
                        });
                    }
                });
            } else {
                swal("Tag Tidak Di Hapus!");
            }
            });
        }
        // proses category dan tag
        $('#form-template-tag').on('submit',function(e){
            if (!e.isDefaultPrevented()) {
                let id = $('#idtag').val();

                if (save_method == 'add') url = "{{url('admin/tag_tambah')}}";
                else url = "{{url('admin/tag_edit').'/'}}"+id;

                $.ajax({
                    url : url,
                    type : "POST",
                    data : $('#form-template-tag').serialize(),
                    success : function(){
                        if (save_method == 'add') {
                            iziToast.success({
                                title: 'Berhasil',
                                message: 'Tag Berhasil Di Tambahkan',
                            });
                        }else{
                            iziToast.success({
                                title: 'Berhasil',
                                message: 'Tag Berhasil Di Edit',
                            });
                        }
                        tabletag.ajax.reload();
                        $('#formModalTag').modal('hide');
                    },
                    error : function(){
                        if (save_method == 'add') {
                            iziToast.error({
                                title: 'Gagal',
                                message: 'Tambah Tag Gagal, Coba Lagi',
                            });
                        }else{
                            iziToast.error({
                                title: 'Gagal',
                                message: 'Edit Media Tag, Coba Lagi',
                            });
                        }
                        $('#formModalTag').modal('hide');
                    }
                });
                return false;
            }
        });
    </script>
@endpush