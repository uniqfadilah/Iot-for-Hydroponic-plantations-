@extends('layout/main')

@section('title','Halaman Data Sayur')
@section('kelola','menu-open')
@section('tandon','active')

@section('head')
<link rel="stylesheet" href="{{url('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('title','Data tandon')
@section('container')
<!-- Main content -->
 <div class="container">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data tandon</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>KODE-TANDON</th>
                  <th>KODE-GH</th>
                  <th>VOLUME</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tandon as $tandon)
                <tr>
                  <td>{{$tandon->id}}</td>
                  <td>{{$tandon->kode}}</td>
                  <td>{{$tandon->grenhouse['kode']}}</td>
                  <td>{{$tandon->volume_tandon}} Liter</td>
                  <form action="dmtandon/{{$tandon->id}}" method="post">
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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">Tambah tandon</button>
          <div class="modal fade" id="modal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-l">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id='modaltitle'>Tambah Tandon/h4>
              </div>
              <div class="modal-body">
                <form action="/dmtandon" method="post" id="link">
                @csrf
                <div class="container-fluid">
                  <label >Volume Tandon</label>
                  <div class="input-group mb-3">
                      <input type="number" class="form-control" id="volume" name="volume" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                       <span class="input-group-text" id="basic-addon2">Dalam Liter</span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        @include('sweetalert::alert')        
 </div>

@endsection
@section('foot')

<script src="{{url('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
    });
  });
</script>
<script type="text/javascript">


  $(document).ready(function(){
    var table = $("#example1").DataTable();
    table.on('click','.modalopen', function(){
      $tr= $(this).closest('tr');
      if($($tr).hasClass('cild'))
      {
        $tr=$tr.prev('.parent');
      }
      var data = table.row($tr).data();
      var hasil=data[3].match(/\d+/)[0];
          $('#link').attr('action','/edittandon/'+data[0]);
          $('#volume').val(hasil);
          $('#modaltitle').html('Edit Data Tandon');
          $('#modal').modal('show');
          $('#modal').on('hidden.bs.modal', function () {
           $(this).find('form').trigger('reset');
    })
  })
});
</script>
@endsection

