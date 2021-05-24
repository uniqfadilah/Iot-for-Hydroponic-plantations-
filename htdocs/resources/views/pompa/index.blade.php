@extends('layout/main')

@section('title','Halaman Data Sayur')
@section('kelola','menu-open')
@section('pompa','active')

@section('head')
<link rel="stylesheet" href="{{url('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('title','Data Pompa')
@section('container')
<!-- Main content -->
 <div class="container">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data pompa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>ID</th>
                  <th>KODE-POMPA</th>
                  <th>KODE-TANDON</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pompa as $pompa)
                <tr>
                  <td>{{$pompa->id}}</td>
                  <td>{{$pompa->tandon['id']}}</td>
                  <td>{{$pompa->kode}}</td>
                  <td>{{$pompa->tandon['kode']}}</td>
                  @if($pompa->status=='0')
                  <td>Aktif</td>
                  @else
                  <td>Mati</td>
                  @endif
                  <form action="dmpompa/{{$pompa->id}}" method="post">
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
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal">Tambah pompa</button>
          <div class="modal fade" id="modal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-l">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id='modaltitle'>Tampah Pompa</h4>
              </div>
              <div class="modal-body">
                <form action="/dmpompa" method="post" id="link">
                @csrf
                <div class="container-fluid">
                <div class="input-group mb-3">
                    <select class="custom-select" name='tandon' id="tandon">
                    <option value="" selected disabled hidden>Pilih Tandon</option>
                    @foreach($tandon as $tandon)
                    <option value="{{$tandon['id']}}">{{$tandon['kode']}}</option>
                    @endforeach
            </select>
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
$(function() {
    $("#example1").DataTable({
      "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            },

        ]
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

