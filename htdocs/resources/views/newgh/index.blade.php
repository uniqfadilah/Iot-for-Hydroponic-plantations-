@extends('layout/main')

@section('title','Halaman Data Sayur')
@section('kelola','menu-open')
@section('newgh','active')

@section('head')
<link rel="stylesheet" href="{{url('/plugins/datatables-bs4/css/dataTables.bootstrap4.css')}}">
@section('title','buat gh baru')
@section('container')
<!-- Main content -->
 <div class="container">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Greenhouse</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>KODE-GH</th>

                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>
                @foreach($greenhouse as $gh)
              <tr>
                <td>{{$gh->id}}</td>
                <td>{{$gh['kode']}}</td>
                <td><button type='button' class="btn btn-success modalopen d-inline" data-id="$gh->id">Edit</button>
                    <button type='submit' class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button></td>
              </tr>
              @endforeach
                </tbody>
     
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <button type="button" class="btn btn-success modaltambah" data-toggle="modal" data-target="#modal">Tambah Greenhouse</button>
          <div class="modal fade" id="modal" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-l">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title"> TAMBAH DATA GREENHOUSE</h4>
              </div>
              <div class="modal-body">
            <form action="/newgreenhouse" method="post">
            @csrf
            <label>TANDON</label>
            <div class="input-group mb-3">
            <select class="custom-select" name='tandon'>
            <option value="" selected disabled hidden>Pilih tandon</option>
            @foreach($tandon as $tandon)
              <option value="{{$tandon['id']}}">{{$tandon['kode']}}</option>
              @endforeach
              </select>
          </div>
              <label>TERMOMETER</label>
              <div class="input-group mb-3">
              <select class="custom-select" name='termo'>
              <option value="" selected disabled hidden>Pilih Termometer</option>
              @foreach($termo as $termo)
                <option value="{{$termo['id']}}">{{$termo['kode']}}</option>
                @endforeach
                </select>
          </div>
                <label>KIPAS</label>
              <div class="input-group mb-3">
              <select class="custom-select" name='kipas'>
              <option value="" selected disabled hidden>Pilih Kipas</option>
              @foreach($kipas as $kipas)
                <option value="{{$kipas['id']}}">{{$kipas['kode']}}</option>
                @endforeach
                </select>
          </div>
              <label>LAMPU</label>
              <div class="input-group mb-3">
              <select class="custom-select" name='lampu'>
              <option value="" selected disabled hidden>Pilih lampu</option>
              @foreach($lampu as $lampu)
                <option value="{{$lampu['id']}}">{{$lampu['kode']}}</option>
                @endforeach

            </select>
             </div>
              <label>LUX</label>
              <div class="input-group mb-3">
              <select class="custom-select" name='lux'>
              <option value="" selected disabled hidden>Pilih lux</option>
              @foreach($lux as $lux)
                <option value="{{$lux['id']}}">{{$lux['kode']}}</option>
                @endforeach

            </select>
             </div>
              <label>PENANGGUNG JAWAB</label>
              <div class="input-group mb-3">
              <select class="custom-select" name='pegawai'>
              <option value="" selected disabled hidden>Pilih Penanggung Jawab</option>
              @foreach($pegawai as $pegawai)
                <option value="{{$pegawai['id']}}">{{$pegawai['nama']}}</option>
                @endforeach
            </select>
             </div>
             <button type="submit" class="btn btn-success">Submit</button>
              <form>
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
    $('.modalopen').on('click', function () {
    var id = $(this).data('id');
    $.ajax({
        type: 'GET',
        url: '/datagh',
        data: { 'id': id },
        dataType: 'json',
        success: function (result) {
            let data = result;
            console.log(data);

        },
        error: function () {
        }
    });
        $('#modals').modal('show');
        $('#modals').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
          });
    })
</script>
@endsection

