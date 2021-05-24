@extends('layout/main')

@section('title','Halaman Data Sayur')
@section('kelola','menu-open')
@section('kipas','active')

@section('head')
<link rel="stylesheet" href="{{url('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('title','Data Kipas')
@section('container')
<!-- Main content -->
 <div class="container">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Kipas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>KODE-ALAT</th>
                  <th>KODE-GH</th>
                  <th>STATUS</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kipas as $kipas)
                <tr>
                  <td>{{$kipas['id']}}</td>
                  <td>{{$kipas['kode']}}</td>
                  <td>{{$kipas->greenhouse['kode']}}</td>
                  @if($kipas->status == '0')
                  <td>Kipas Mati</td>
                  @else
                  <td>Kipas Menyala</td>
                  @endif
                  <form action="dmkipas/{{$kipas->id}}" method="post">
                      <td>
                        @csrf
                        @method('delete')
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
          <form action="/dmkipas" method="post">
            @csrf
          <button type="submit" class="btn btn-success">Tambah Kipas</button>
          </form>
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
