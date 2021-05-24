@extends('/layout/main')
@section('hasilpanen', 'active')
@section('laporan','menu-open')
@section('head')
<link rel="stylesheet" href="{{url('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('title','Halaman Green House')
@section('container')
<!-- Main content -->
 <div class="container">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Hasil Panen</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>ID-GH</th>
                  <th>NAMA SAYUR</th>
                  <th>TANGGAL PANEN</th>
                  <th>BERAT</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hasilpanen as $hp)
                <tr>
                      <td>{{$hp->id}}</td>
                      <td>{{$hp->greenhouse->kode}}</td>
                      <td>{{$hp->greenhouse->datasayur->namasayur}}</td>
                      <td>{{$hp->created_at->format('d M Y')}} </td>
                      <td>{{$hp->hasilpanen}} Kg</td>
                      <form action="hasilpanen/{{$hp['id']}}" method="post">
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
          <div class="modal fade" id="modal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-l">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id='modaltitle'>Edit Hasil Panen</h4>
              </div>
              <div class="modal-body">
                <form action="" method="post" id="link">
                @csrf
                @method('patch')
                <div class="container-fluid">
                  <label > Edit Hasil Panen</label>
                  <div class="input-group mb-3">
                      <input type="number" class="form-control" id="hasil" name="hasil" aria-describedby="basic-addon2">
                     <div class="input-group-append">
                       <span class="input-group-text" id="basic-addon2">Dalam Kg</span>
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
      "order" :  [[ 1, "desc" ]]
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
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
      var hasil=data[4].match(/\d+/)[0];
          $('#link').attr('action','/hasilpanen/'+data[0]);
          $('#hasil').val(hasil);
          $('#modal').modal('show');
          $('#modal').on('hidden.bs.modal', function () {
           $(this).find('form').trigger('reset');
    })
  })
});
</script>
@endsection
