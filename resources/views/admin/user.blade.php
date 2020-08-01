@extends('admin/layouts/app')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="card-title"><b>List User</b></h3>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-success" onclick="formtambah()" data-toggle='modal' data-target='#formModal'><i class="tim-icons icon-paper"></i>&nbsp;Tambah</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table tablesorter" id="listuser" width='100%'>
                                <thead class=" text-primary">
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>
                                            Username
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Photo
                                        </th>
                                        <th>
                                            Level
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
                                <label for="">Username</label>
                                <input type="text" name='name' id='name' class="form-control @error('name') is-invalid @enderror" style='color:black;'>
                                @error('name')
                                    {{$message}}
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label for="" id='labelpwd'>Password </label>
                                <input type="password" id='inputpwd' name='password' id='password' class="form-control @error('password') is-invalid @enderror" style='color:black;'></input>
                                <div class="text-secondary"id='labelpesanpwd' style="color:black !important;"><small></small></div>
                                @error('password')
                                    {{$message}}
                                @enderror
                            </div> 
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name='email' id='email' class="form-control @error('email') is-invalid @enderror" style='color:black;'>
                                @error('email')
                                    {{$message}}
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label for="">Photo</label>
                                <a href="" id="linkpesanphoto" target="_blank">
                                    <div class="text-secondary"id='labelpesanphoto' style="color:black !important;">
                                        <small></small>
                                    </div>
                                </a>
                                <input type="file" name='photo' id='photo' class="form-control @error('photo') is-invalid @enderror" style='opacity:100%;position: static;color:black;'>
                                @error('photo')
                                    {{$message}}
                                @enderror
                            </div>  
                            <div class="form-group">
                                <label for="">Level</label>
                                <select name='level' id='level' class="form-control @error('level') is-invalid @enderror" style='color:black;'>
                                    <option value="" selected>-Pilih Hak Akses-</option>
                                    <option value="admin" data-value='admin'>Admin</option>
                                    <option value="user" data-value='user'>User</option>
                                </select>
                                @error('level')
                                    {{$message}}
                                @enderror
                            </div>  
                            
                            {{--  captcha  --}}
                            <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">                            
                                <div class="col-md-6 pull-center">
                                {!! app('captcha')->display() !!}
                            
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                </div>
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
@endsection

@push('datatables_ajax')
    <script>
        let table = $('#listuser').DataTable({
            processing : true,
            serverSide : true,
            ajax : {
                url : "{{url('admin/user_api')}}",
                type : "get",
            },
            columns : [
                {
                    name : 'id',
                    data : 'id'
                },
                {
                    name : 'name',
                    data : 'name'
                },
                {
                    name : 'email',
                    data : 'email'
                },
                {
                    name : 'photo',
                    data : 'photo'
                },
                {
                    name : 'level',
                    data : 'level'
                },
                {
                    name : 'tombol_aksi',
                    data : 'tombol_aksi'
                }
            ],
            order : [[0,'asc']]
        });

        // konf tambah
        const formtambah = () =>{
            save_method = 'add';
            $('#form-template')[0].reset();
            $('#modal-title').text('Form Tambah Akun');
            $('#modal-button').text('Tambah');
            $('#labelpwd').text('Password');
            $('#labelpesanpwd').text('');
            $('#inputpwd').attr('name','password');
            $('#inputpwd').attr('id','password');
        }

        // conf edit
        const formedit = (id) =>{
            save_method = 'edit';
            $('input[name=_method]').val('PATCH');
            $('#form-template')[0].reset();
            $('#modal-title').text('Form Edit Akun');
            $('#modal-button').text('Edit');
            $('#labelpwd').text('Password Baru');
            $('#labelpesanpwd').text('Isi Untuk Mengganti Password baru');
            $('#inputpwd').attr('name','password_baru');
            $('#inputpwd').attr('id','password_baru');
            $.ajax({
                url : "{{url('admin/user_route_edit').'/'}}"+id,
                type : 'get',
                success : function(data){
                    // console.log(data);
                    $('#id').val(data.id);
                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $("#level option[data-value='" + data.level +"']").attr("selected","selected");
                    $('#labelpesanphoto').text('Foto Saat ini : '+ data.name);
                    $('#linkpesanphoto').attr('href',"{{asset('storage').'/'}}"+data.photo);
                    grecaptcha.reset();
                },
                error : function(){
                    iziToast.error({
                        title: 'Oops!',
                        message: 'Get Data Gagal ,Coba Lagi',
                    });
                }
            });
        }

        const formhapus = (id) =>{
            let token = $("meta[name='csrf_token']").attr('content');
            swal({
                title: "Kamu Yakin Menghapusnya?",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url : "{{url('admin/user_hapus').'/'}}"+id,
                    type : "post",
                    data : {"_method" : "DELETE" , "_token" : token},
                    success : function(){
                        swal("User Berhasil Di Hapus!", {
                        icon: "success",
                        });
                        table.ajax.reload();
                    },
                    error : function(){
                        swal("User Gagal Di Hapus!", {
                        icon: "error",
                        });
                    }
                }); 
            } else {
                swal("User Tidak Di Hapus!");
            }
            });
        }

        // process tambah dan edit
        $('#form-template').on('submit',function(e){
            if (!e.isDefaultPrevented()) {
                let id = $('#id').val();
                if (save_method == 'add') url = "{{url('admin/user_tambah')}}";
                else url = "{{url('admin/user_edit').'/'}}"+id;

                $.ajax({
                    url : url,
                    type : 'POST',
                    data : new FormData($('#form-template')[0]),
                    processData : false,
                    contentType : false,
                    success : function(){
                        table.ajax.reload();
                        $('#formModal').modal('hide');
                        if (save_method == 'add') {
                            iziToast.success({
                                title: 'Berhasil',
                                message: 'User Berhasil Di Tambahkan',
                            });
                        }else{
                            iziToast.success({
                                title: 'Berhasil',
                                message: 'User Berhasil Di Edit',
                            });
                        }
                    },
                    error : function(){
                        if (save_method == 'add') {
                            iziToast.error({
                                title: 'Gagal',
                                message: 'Tambah User Gagal, Coba Lagi',
                            });
                        }else{
                            iziToast.error({
                                title: 'Gagal',
                                message: 'Edit User Gagal, Coba Lagi',
                            });
                        }
                        $('#formModal').modal('hide');
                    }
                });
                return false;
            }
        });
    </script>
@endpush