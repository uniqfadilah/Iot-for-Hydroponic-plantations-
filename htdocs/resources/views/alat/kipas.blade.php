@extends('/layout/main')
@section('alat', 'menu-open')
@section('laporan','menu-open')
@section('lkipas','active')
@section('head')
<link rel="stylesheet" href="{{url('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('title','Laporan Alat dan Nutrisi')
@section('container')
<!-- Main content -->
 <div class="container">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Penggunaan Kipas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>BULAN</th>
                  <th>LAMA PENGGUNAAN</th>
                </tr>
                </thead>
                <tbody>
                @foreach($kipas as $kipas)
                <tr>
                      <td>{{$kipas->bulan}}</td>
                      <td>{{round($kipas->penggunaan/3600, 2)}} JAM</td>
                    </tr>
                @endforeach
                </tbody>
     
              </table>
            </div>
            <!-- /.card-body -->
          </div>
         
 </div>
 </div>

@endsection
@section('foot')

<script src="{{url('/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{url('/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

<!-- page script -->
<script>
  $(function () {
   $('#example').dataTable( {
    "order": [],
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
  });
   $('#example2').dataTable( {
    "order": [],
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
  });
   $('#example3').dataTable( {
    "order": [],
    "columnDefs": [ {
      "targets"  : 'no-sort',
      "orderable": false,
    }]
  });

  });
</script>

@endsection
