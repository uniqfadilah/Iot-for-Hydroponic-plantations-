@extends('layout/main')

@section('title','Halaman Data Sayur')
@section('kelola','menu-open')
@section('pegawai','active')

@section('head')
<link rel="stylesheet" href="{{url('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('title','Data Pegawai')
@section('container')
<!-- Main content -->
 <div class="container">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Peagawai</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NAMA PEGAWAI</th>
                  <th>NO-HP</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pegawai as $pegawai)
                <tr>
                  <td>{{$pegawai->id}}</td>
                  <td>{{$pegawai->nama}}</td>
                  <td>{{$pegawai->no_hp}}</td>
                  <form action="pegawai/{{$pegawai->id}}" method="post">
                      <td>
                        @csrf
                        @method('delete')
                        <button type='button' class="btn btn-success modalopen">Edit</button>
                        <button type='submit' class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                      </td>
                    </form>
                </tr>
                @endforeach
                </tbody>
     
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">Tambah Pegawai</button>
          <div class="modal fade" id="modal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id='title'>Tambah Data Pegawai</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form action="/pegawai" method="post" id='link' enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                    <label>NAMA</label>
                    <input type="text" class="form-control" name='nama' id='nama' placeholder="Masukan nama">
            </div>
            <div class="form-group">
                    <label>ALAMAT</label>
                    <input type="text" class="form-control" name='alamat' id='alamat' placeholder="Masukan alamat">
            </div>
            <div class="form-group">
                    <label>NO HP</label>
                    <input type="number" class="form-control" name='hp' id='hp' placeholder="NO HP">
            </div>
            <div class="form-group">
                  <label>USERNAME</label>
                  <input type="text" class="form-control" name='username' id='username' placeholder="Username">
            </div>
            <div class="form-group">
                  <label>PASSWORD</label>
                  <input type="password" class="form-control" name='password' id='password' placeholder="password">
            </div>
            <div class="form-group">
              <label for="exampleInputFile">File Gambar</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" accept="image/*" id="exampleInputFile" name="image" >
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
              </div>
            </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary tombolmodal">Simpan</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        @include('sweetalert::alert')        
 </div>

@endsection
@section('foot')

<script src="{{url('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script src="{{url('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
$(function() {
    $("#example1").DataTable({
    });
    });

</script>
<script type="text/javascript">
$(document).ready(function () {
      bsCustomFileInput.init();
    });

  $(document).ready(function(){
    var table = $("#example1").DataTable();
    table.on('click','.modalopen', function(){
      $tr= $(this).closest('tr');
      if($($tr).hasClass('cild'))
      {
        $tr=$tr.prev('.parent');
      }
      var data = table.row($tr).data();
          $('#link').attr('action','/editpompa/'+data[0]);
          $('#modal').modal('show');
          $('#tandon').val(data[1]);
          $('#modaljudul').html('Edit Data Pompa');
          $('#modal').on('hidden.bs.modal', function () {
           $(this).find('form').trigger('reset');
    })
  })
});
</script>
@endsection

