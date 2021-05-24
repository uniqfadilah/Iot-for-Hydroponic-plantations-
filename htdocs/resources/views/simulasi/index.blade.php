


@section('container')
@extends('layout/main')

@section('container')

<div class="container row">

          <div class="col-lg-4 col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">gh</h3>
                

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>GH</th>
                      <th>SUHU</th>
                      <th>INPUT</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                    @foreach($gh as $hp)
                      <td>{{$hp->kode}}</td>
                      <td>
                      <form action="/simulasi/{{$hp->id}}/suhu" method="post" >
                        @csrf
                      <div class="form-group">
                    <input type="number" name="suhu" class="form-control" id="">
                    </div> </td>
                      <td><button type="submit" class="btn btn-success">INPUT</button></td>
                      </form>
                    </tr>

                  @endforeach
                  </tbody>
                </table>
                
              </div>
              
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
            
          </div>
          <div class="col-lg-4 col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">HYGROMETER</h3>
                

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>GH</th>
                      <th>KELEMBABAN</th>
                      <th>INPUT</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                    @foreach($gh as $hp)
                      <td>{{$hp->kode}}</td>
                      <td>
                    <form action="/simulasi/{{$hp->id}}/hum" method="post" >
                         @csrf
                      <div class="form-group">
                    <input type="number" name="hum" class="form-control" id="">
                    </div> </td>
                      <td><button type="submit" class="btn btn-success">INPUT</button></td>
                     
                    </tr>
                    
                    </form>
                  @endforeach
                  </tbody>
                </table>
                
              </div>
              
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
            
          </div>
        
          <div class="col-lg-4 col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">LUXMETER</h3>
                

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>GH</th>
                      <th>LUX</th>
                      <th>INPUT</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                    @foreach($gh as $lux)
                
                      <td>{{$lux->kode}}</td>
                      <td>
                      <form action="/simulasi/{{$lux->id}}/lux" method="post" >
                         @csrf
                      <div class="form-group">
                    <input type="number" name="lux" class="form-control" id="">
                    </div> </td>
                      <td><button type="submit" class="btn btn-success">INPUT</button></td>
                      </form>
                 
                    </tr>
              
                  @endforeach
                  </tbody>
                </table>
                
              </div>
              
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
            
          </div>
          <div class="col-lg-4 col-4">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">TANDON</h3>
                

                <div class="card-tools">
                  
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>GH</th>
                      <th>TANDON</th>
                      <th>INPUT</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                    @foreach($gh as $tandon)
                
                      <td>{{$tandon->kode}}</td>
                      <td>
                      <form action="/simulasi/{{$tandon->id}}/tandon" method="post" >
                         @csrf
                      <div class="form-group">
                    <input type="number" name="volume" class="form-control" id="">
                    </div> </td>
                      <td><button type="submit" class="btn btn-success">INPUT</button></td>
                      </form>
                 
                    </tr>
              
                  @endforeach
                  </tbody>
                </table>
                
              </div>
              
              <!-- /.card-body -->
            </div>

            <!-- /.card -->
            
          </div>
          </div>
        
        </div>


@endsection


@endsection
