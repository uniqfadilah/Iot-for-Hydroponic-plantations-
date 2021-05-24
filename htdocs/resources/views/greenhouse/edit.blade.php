@extends('/layout/main')

@section('title','Halaman Green House')

@section('container')

<div class="container-fluid col-sm-8">
  <div class="card card-success">
      <div class="card-header">
          <h3 class="card-title">Pilih sayur yang akan ditanam</h3>
      </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="/greenhouse/{{$greenhouse->id}}/getonn" method="post" >
                {{ csrf_field() }}

                  <div class="row">
                    <div class="col-sm-12">
                      <!-- select -->
                      <div class="form-group">
                     
                        <label>Daftar sayur</label>
                        <select type="text" class="form-control"  name="sayur" >
                        @foreach ($datasayur as $gh)
                          <option value='{{$gh->id}}'>{{$gh->namasayur}}</option>
                        @endforeach
                        </select>
                           </div>
                           </div>
                  
                       </div>
           
                      </div>
                      <div class="card-footer">
                  <button type="submit" class="btn btn-success">Mulai tanam!</button>
                </div>
            </div>

@endsection