@extends('/layout/main')

@section('title','Halaman Green House')

@section('container')

<div class="container col-sm-8">

<div class="card card-success ">
              <div class="card-header">
                <h3 class="card-title">Input/nonaktifkan greenhouse</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/greenhouse/{{$greenhouse->id}}/getoff" method="post" >
              {{ csrf_field() }}

            <div class="input-group mb-3">
            <input type="text" class="form-control" name="hasil" placeholder="Masukan Hasil panen" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">Dalam Kg</span>
            </div>
            </div>
              <!-- /.card-body -->
            </div>
            <div class="card-footer" >
            <button type="submit" class="btn btn-success">Input hasil tanam</button>
            </form>
            <form class="d-inline" action="/greenhouse/{{$greenhouse->id}}/getof" method="post">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger">Nonaktikan GH!</button>   
             
            </form>
        </div>
            </div>
</div>
</div>            
@endsection