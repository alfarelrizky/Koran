@extends('admin/layouts/app')

@section('content')
    <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h3 class="card-title"><b>List Media</b></h3>                            
                        </div>
                        <div>
                            <button class='btn btn-sm btn-success' onclick='tambahmedia();' data-toggle='modal' data-target='#formModal'><i class="tim-icons icon-paper"></i> &nbsp; Tambah</button>
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
                          Nama Media
                        </th>
                        <th>
                          Logo
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
                          <label for="">Nama Media</label>
                          <input type="text" name='NamaMedia' id='NamaMedia' class="form-control @error('NamaMedia') is-invalid @enderror" style='color:black;'>
                          @error('NamaMedia')
                              {{$message}}
                          @enderror
                      </div>  
                      <div class="form-group">
                          <label for="">Logo</label>
                          <div>
                            <a href="" id="linkgambarlama" target="_blank" style="color:black;text-decoration:none;"><label for="" id="infogambarlama"></label></a>
                          </div>
                          <input type="file" name='Logo' id='Logo' class="form-control @error('Logo') is-invalid @enderror" style='color:black;opacity:100%;position: static;'>
                          @error('Logo')
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
@endsection

@push('datatables_ajax')
    <script>
        const tambahmedia = () =>{
          $('#form-template')[0].reset();
          save_method = 'add';
          $('#modal-title').text('Form Tambah Media');
          $('#modal-button').text('Tambah Media');
        }
        const editmedia = (id) =>{
          $('#form-template')[0].reset();
          save_method = 'edit';
          $('#modal-title').text('Form Edit Media');
          $('#modal-button').text('Edit');
          $('input[name=_method]').val('PATCH');
          $.ajax({
            url : "{{url('admin/media/route_edit').'/'}}"+id,
            type : "GET",
            success : function(data){
              // alert('Berhasil');
              $('#id').val(data.id);
              $('#NamaMedia').val(data.NamaMedia);
              $('#infogambarlama').text('Logo Lama : '+data.NamaMedia);
              $('#linkgambarlama').attr('href',"{{asset('/storage').'/'}}"+data.logo);
            },
            error : function(e){
              // alert(e);
            }
          });
        }

        let table = $('#templateTable').DataTable({
            processing : true,
            serverSide : true,
            ajax : {
                url : "{{url('admin/mediaapi')}}",
                type : 'GET',
            },
            columns : [
                {
                    name : 'id',
                    data : 'id'
                },
                {
                    name : 'NamaMedia',
                    data : 'NamaMedia'
                },
                {
                    name : 'gambar',
                    data : 'gambar'
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

      //process tambah dan edit
      $('#form-template').on('submit',function(e){
        if (!e.isDefaultPrevented()) {
          let id = $('#id').val();

          if (save_method == 'add') url = "{{url('admin/media/tambah')}}";
          else url = "{{url('admin/media/proses_edit').'/'}}"+id;

          $.ajax({
            url : url,
            type : "POST",
            data : new FormData($('#form-template')[0]),
            contentType : false,
            processData : false,
            success : function(){
              if (save_method == 'add') {
                iziToast.success({
                    title: 'Berhasil',
                    message: 'Media Berhasil Di Tambahkan',
                });
              }else{
                iziToast.success({
                    title: 'Berhasil',
                    message: 'Media Berhasil Di Edit',
                });
              }
              table.ajax.reload();
              $('#formModal').modal('hide');
            },
            error : function(){
              if (save_method == 'add') {
                iziToast.error({
                    title: 'Gagal',
                    message: 'Tambah Media Gagal, Coba Lagi',
                });
              }else{
                iziToast.error({
                    title: 'Gagal',
                    message: 'Edit Media Gagal, Coba Lagi',
                });
              }
              $('#formModal').modal('hide');
            }
          });

          return false;
        }
      })

      const hapusmedia = (id) =>{
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
              url: "{{url('admin/media/hapus').'/'}}"+id,
              type : 'post',
              data : {"_method" : 'DELETE',"_token" : token},
              success :function(){
                swal("Data Media Berhasil Di Hapus!", {
                  icon: "success",
                });
              },
              error : function(){
                swal("Data Media Gagal Di Hapus!", {
                  icon: "error",
                });
              }
            });
          } else {
            swal("OK, Data Media Tidak Di Hapus!");
          }
          table.ajax.reload();
        });
      }
    </script>
@endpush