@extends('/layout/main')
@section('head')
<meta http-equiv="refresh" content="500" />
<link rel="stylesheet" href="{{url('zoom/style.css')}}">
@section('title','Halaman Green House')
@section('container')
<div id='ids' data-id='{{$greenhouse->id}}'></div>
<div class="container">
<div class="row">
@include('sweetalert::alert')
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modalsuhu" id="boxsuhu"><i class="fa fa-thermometer-half"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Suhu</span>
          <span class="info-box-number" id="viewsuhu">Loading...</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modaltandon" id="boxtandon"><i class="fa fa-water"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Volume tandon</span>
          <span class="info-box-number" id="viewtandon">Loading...</span>
        </div>
      </div>
    </div>
    <!-- kelembaban -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modalkelembaban" id="boxkelembaban"><i class="fa fa-tint"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Kelembaban</span>
          <span class="info-box-number" id="viewkelembaban">Loading...</span>
        </div>
      </div>
    </div>
    <!-- intensitas box -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modalintensitas" id="boxlux"><a href="#"><i class="fa fa-adjust"></i></a></span>

        <div class="info-box-content">
          <span class="info-box-text">Intensitas Cahaya</span>
          <span class="info-box-number" id="viewintensitas">Loading...</span>
        </div>
      </div>
    </div>
    <!-- kipas -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-secondary" type="button" data-toggle="modal" data-target="#modalkipas" id="boxkipas"><i class="far fa-sun"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Status Kipas</span>
        <span class="info-box-number" id="viewkipas">Loading...</span>
        </div>
      </div>
    </div>
    <!-- KIPASBOX -->
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-secondary" type="button" data-toggle="modal" data-target="#modallampu" id="boxlampu"><i class="far fa-lightbulb"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Status lampu</span>
        <span class="info-box-number" id="viewlampu">Loading...</span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-success" type="button" data-toggle="modal" data-target="#modalsayur"><i class="fas fa-leaf"></i></span>

        <div class="info-box-content">
          <span class="info-box-text">Sayur yang ditanam</span>
          <span class="info-box-number">{{$greenhouse->datasayur->namasayur}}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-12">
      <div class="info-box">
        <span class="info-box-icon bg-success" type="button" data-toggle="modal" data-target="#modalprediksi"><i class="far fa-calendar"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Prediksi panen</span>
          <span class="info-box-number">{{$wktprediksi}}</span>
        </div>
      </div>
    </div>

          <div class="col-sm-6">
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">Pesan Langsung</h3>

                    <div class="card-tools">
                      
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                     
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                      <!-- Message. Default to the left -->
                      @foreach($pesan as $ps)
                      @if($ps['pengirim']=='0')
                      <div class="direct-chat-msg">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-left">ADMIN</span>
                          <span class="direct-chat-timestamp float-right">{{$ps->created_at->format('H:i:s')}}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{url('dist/img/user1-128x128.jpg')}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        {{$ps['pesan']}}</br>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      
                      
                      @else
                      <div class="direct-chat-msg right">
                        <div class="direct-chat-infos clearfix">
                          <span class="direct-chat-name float-right">{{$greenhouse->penanggungjawab->nama}}</span>
                          <span class="direct-chat-timestamp float-left">{{$ps->created_at->format('H:i:s')}}</span>
                        </div>
                        <!-- /.direct-chat-infos -->
                        <img class="direct-chat-img" src="{{url('dist/img/pekerja/'.$greenhouse->penanggungjawab['gambar'])}}" alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text">
                        {{$ps['pesan']}}</br>
                        </div>
                        <!-- /.direct-chat-text -->
                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <form action="/greenhouse/{{$greenhouse->id}}/pesanadmin" method="post">
                    @csrf
                      <div class="input-group">
                        <input type="message" name="pesan" required oninvalid="this.setCustomValidity('pesan tidak boleh kosong')" placeholder="Tulis Pesan ..." class="form-control" autocomplete="off"> 
                        <span class="input-group-append">
                          <button type="submit" class="btn btn-warning">Kirim</button>
                        </span>
                      </div>
                    </form>
                  </div>
                  
                </div>
                <button data-toggle="modal" data-target="#modalinputpanen" class="btn btn-success col-12 ">INPUT HASIL PRIODE PANEN!</button>
              </div>
              
          <div class="col-sm-6" >
                <!-- DIRECT CHAT -->
                <div class="card direct-chat direct-chat-warning">
                  <div class="card-header">
                    <h3 class="card-title">CCTV Greenhouse</h3>

                    <div class="card-tools">
                      
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                     
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body" >
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" style="height: 266px;">
                      <!-- Message. Default to the left -->
                      <div class="d-flex justify-content-center">
                
  
                        
                    <img id="stream" src="http://192.168.100.101:81/stream"></div>
               
                    </div>
                    <div class="card-footer">
                      <div class="input-group">
                          <button id="btn" data-toggle="modal" data-target="#modaltimeline" class="btn btn-outline-secondary col-12">Laporan Greenhouse</button>
                      </div>
                  </div>
            </div> 
           
            </div> 
            <button data-toggle="modal" data-target="#modaldanger" class="btn btn-danger col-12 ">NONAKTIFKAN GREENHOUSE!</button> 
             
          </div> 



<!-- modals -->
  <div class="modal fade" id="modalsuhu" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Detail Suhu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-8">
                <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body table-responsive p-0" style="height: 330px;">
                    <table class="table table-head-fixed text-nowrap">
                      <thead>
                        <tr>
                          <th>WAKTU</th>
                          <th>TANGGAL</th>
                          <th>SUHU</th>
                          <th>STATUS</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($suhu as $suhu)
                        <tr>
                          <td>{{$suhu->created_at->isoFormat('HH:mm')}}</td>
                          <td>{{$suhu->created_at->isoFormat('DD MMMM YYYY')}}</td>
                          <td>{{$suhu->suhu}}°C</td>
                          @if($suhu->suhu<$greenhouse->datasayur->suhuopt)
                          <td><span class="badge badge-success">Suhu Cukup</span></td>
                          @else
                          <td><span class="badge badge-warning">Terlalu Panas</span></td>
                          @endif
                        </tr>
                      
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <div class="col-4">
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fa fa-thermometer-half"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Suhu</span>
                <span class="info-box-number">{{$greenhouse->termometer->getsuhu['suhu']}}°C</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fas fa-leaf"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Suhu Optimal</span>
                <span class="info-box-number">{{$greenhouse->datasayur['suhuopt']}}°C</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            @if($greenhouse->termometer->getsuhu['suhu']>$greenhouse->datasayur['suhuopt'])
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fa fa-exclamation-triangle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Suhu terlalu tinggi</span>
                <span class="info-box-number">+{{$greenhouse->termometer->getsuhu['suhu']-$greenhouse->datasayur['suhuopt']}}°C</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            @endif
          </div>
        
  </div>  
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
        <div class="modal fade" id="modaltandon" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Pengisian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
              
                    <div class="col-8">
                      <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>TANGGAL</th>
                                <th>WAKTU</th>
                                <th>NUTRISI</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($getlogpompa as $log)
                              <tr>
                                <td>{{$log->created_at->isoformat('DD MMMM YYYY')}}</td>
                                <td>{{$log->created_at->isoformat('HH : mm')}}</td>
                                <td>{{$log->total_nutrisi}} Liter</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  <div class="col-4">
                  @if($greenhouse->tandon->pompa['status']=='0')
                  <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fa fa-water"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Volume Air</span>
                      <span class="info-box-number">{{$greenhouse->tandon->volumeair['volume']/$greenhouse->tandon->volume_tandon*100}}%</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                   @elseif($greenhouse->tandon->pompa['status']=='1')
                   <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fa fa-water"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Mengisi Ulang</span>
                      <span class="info-box-number">{{$greenhouse->tandon->pompa->logpompa['created_at']->diffForHumans()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                 @endif
                  
                
                </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalkelembaban" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Kelembaban</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
                    
                    <div class="col-8">
                      <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>WAKTU</th>
                                <th>TANGGAL</th>
                                <th>Hum</th>
                                <th>STATUS</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($greenhouse->termometer->lembab as $kelembaban)
                              <tr>
                                <td>{{$kelembaban->created_at->isoformat('HH:mm')}}</td>
                                <td>{{$kelembaban->created_at->isoformat('DD MMMM YYYY')}}</td>
                                <td>{{$kelembaban->kelembaban}} %</td>
                                @if($kelembaban->kelembaban<$greenhouse->datasayur->kelembabanopt)
                                <td><span class="badge badge-warning">Kelembaban Tidak Optimal</span></td>
                                @else
                                <td><span class="badge badge-success">Kelembaban Optimal</span></td>
                                @endif
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <div class="col-4">
                  <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fas fa-tint"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Kelembaban</span>
                      <span class="info-box-number">{{$greenhouse->termometer->kelembaban['kelembaban']}}  %</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fa fa-leaf"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Kelembaban Optimal</span>
                      <span class="info-box-number">{{$greenhouse->datasayur['kelembabanopt']}} %</span>
                    </div>
                  </div>
                  @if($greenhouse->termometer->kelembaban['kelembaban']<$greenhouse->datasayur['kelembabanopt'])
                  <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Kelembaban Rendah</span>
                      <span class="info-box-number">{{$greenhouse->termometer->kelembaban['kelembaban']-$greenhouse->datasayur['kelembabanopt']}}%</span>
                    </div>
                  </div>
                  @endif
                </div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalintensitas" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Intensitas Cahaya</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
                    
                    <div class="col-8">
                      <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 340px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>WAKTU</th>
                                <th>TANGGAL</th>
                                <th>Hum</th>
                                <th>STATUS</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($greenhouse->luxmeter->lux as $lx)
                              <tr>
                                <td>{{$lx->created_at->isoformat('HH:mm')}}</td>
                                <td>{{$lx->created_at->isoformat('DD MMMM YYYY')}}</td>
                                <td>{{$lx->lux}} Lux</td>
                                @if($lx->lux>$greenhouse->datasayur['luxopt'])
                                <td><span class="badge badge-success">Cahaya Cukup</span></td>
                                @else
                                <td><span class="badge badge-warning">Cahaya Kurang</span></td>
                                @endif
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <div class="col-4">
                  <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fa fa-adjust"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Intensitas Cahaya</span>
                      <span class="info-box-number">{{$greenhouse->luxmeter->getlux['lux']}} lux</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  @if($greenhouse->luxmeter->getlux['lux']>$greenhouse->datasayur['luxopt'])
                  <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fa fa-leaf"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Lux Optimal</span>
                      <span class="info-box-number">{{$greenhouse->datasayur['luxopt']}} lux</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  @else
                  <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fa fa-exclamation-triangle"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Intensitas Kurang</span>
                      <span class="info-box-number">-{{$greenhouse->datasayur['luxopt']-$greenhouse->luxmeter->getlux['lux']}} lux</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  
                  @endif
                </div>
     
              </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalkipas" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Kipas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
                    
                    <div class="col-8">
                      <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 340px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>TANGGAL</th>
                                <th>AKTIF</th>
                                <th>NONAKTIF</th>
                                <th>PENGGUNAAN</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($getlogkipas as $kps)
                            @if ($greenhouse->kipas['status']=='1' && $loop->first) @continue @endif
                              <tr>
                                <td>{{$kps->created_at->isoFormat('DD MMMM YYYY')}}</td>
                                <td>{{$kps->created_at->isoFormat(' HH : mm ')}}</td>
                                <td>{{$kps->updated_at->isoFormat(' HH : mm ')}}</td>
                                <td>{{\Carbon\CarbonInterval::seconds($kps->penggunaan)->cascade()->forHumans()}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  @if($greenhouse->kipas['status']=='1')
                  <div class="col-4">
                    <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fa fa-sun"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Kipas Aktif</span>
                    <span class="info-box-number">{{$greenhouse->kipas->getlogkipas['created_at']->diffForHumans()}} </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>
                @else
                <div class="col-4">
                    <div class="info-box mb-3 bg-secondary">
                    <span class="info-box-icon"><i class="fa fa-sun"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Kondisi</span>
                      <span class="info-box-number">Kipas Mati</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>
                @endif
              </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modallampu" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Lampu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                
              <div class="row">
                    
                    <div class="col-8">
                      <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 340px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>TANGGAL</th>
                                <th>AKTIF</th>
                                <th>NONAKTIF</th>
                                <th>PENGGUNAAN</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($getloglampu as $lmp)
                            @if ($greenhouse->lampu['status']=='1' && $loop->first) @continue @endif
                              <tr>
                                <td>{{$lmp->created_at->isoformat('DD MMMM YYYY')}}</td>
                                <td>{{$lmp->created_at->isoFormat(' HH : mm ')}}</td>
                                <td>{{$lmp->updated_at->isoFormat(' HH : mm ')}}</td>
                                <td>{{\Carbon\CarbonInterval::seconds($lmp->penggunaan)->cascade()->forHumans()}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                  @if($greenhouse->lampu['status']=='1')
                  <div class="col-4">
                    <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fa fa-lightbulb"></i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Lampu Aktif</span>
                    <span class="info-box-number">{{$greenhouse->lampu->getloglampu['created_at']->diffForHumans()}} </span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>
                @else
                <div class="col-4">
                    <div class="info-box mb-3 bg-secondary">
                    <span class="info-box-icon"><i class="fa fa-lightbulb"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Kondisi</span>
                      <span class="info-box-number">Lampu Mati</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                </div>
                @endif
              </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalsayur" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-s">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Sayur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{$greenhouse->datasayur['namasayur']}}</h3>
                <h5 class="widget-user-desc">{{$greenhouse->datasayur['umurpanen']}} hari</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../dist/img/sawi.jpg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$greenhouse->datasayur['suhuopt']}}°C</h5>
                      <span class="description-text">Suhu Opt</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$greenhouse->datasayur['luxopt']}} lux</h5>
                      <span class="description-text">Int Opt</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  
                  <!-- /.col -->
                  <div class="col-sm-3 border-right">
                    <div class="description-block">
                      <h5 class="description-header">{{$greenhouse->datasayur['kelembabanopt']}} Hum</h5>
                      <span class="description-text">Kel Opt</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3">
                    <div class="description-block">
                      <h5 class="description-header">{{$greenhouse->datasayur['nutrisiopt']}} cc/L</h5>
                      <span class="description-text">Nutrisi Opt</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalprediksi" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-m">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Prediksi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              
            <div class="col-md-12 col-sm-6 col-12">
              <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="fa fa-leaf"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Umur Tanam</span>
                <span class="info-box-number"> {{$umur}} Hari</span>
              </div>
              <!-- /.info-box-content -->
            </div>
           
            <div class="info-box bg-warning">
           
              <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

              <div class="info-box-content">
            
                <span class="info-box-text">Prediksi Panen</span>
                <span class="info-box-number">{{$wktprediksi}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: {{$bar}}%"></div>
                </div>
                <span class="progress-description">
                  {{$getprediksi}} Hari Menuju panen
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
                <div>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modaltimeline" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Riwayat Laporan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
             
              <div class="timeline">
                        <!-- timeline time label -->
                        
                        @foreach($laporans as $lap => $laporan)
                        <div class="time-label">
                          <span class="bg-red">{{$lap}}</br></span>
                        </div>
                        @foreach($laporan as $laporan) 
                        <div>
                          @if($laporan['jenislaporan']=='1')
                          <i class="fa fa-bug bg-red"></i>
                          @elseif($laporan['jenislaporan']=='2')
                          <i class="fa fa-exclamation-triangle bg-yellow"></i>
                          @elseif($laporan['jenislaporan']=='3')
                          <i class="fa fa-flag bg-green"></i>
                          @endif
                     
                          <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{$laporan['created_at']->format('h:i a')}}</span>
                            <h3 class="timeline-header"><a href="#">{{$laporan['keterangan']}}</a> </h3>

                            <div class="timeline-body">
                              <div class="container-fluid">
                              {{$laporan['detail']}}
                              </div>
                              <div class="col-md-8 px-0">
                              <img src="{{url('dist/img/laporan/'.$laporan['gambar'])}}" id="collapseimg{{$laporan->id}}"   class="img-fluid collapse block__pic" alt="Responsive image">
                              </div>
                            </div>
                        
                            <div class="timeline-footer">
                              <button  class="btn btn-primary btn-sm " data-toggle="collapse" data-target="#collapseimg{{$laporan->id}}">Lihat gambar</button>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <!-- END timeline item -->
                        @endforeach
                   
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                          <i class="fas fa-home bg-maroon"></i>

                          <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{$greenhouse->created_at->toFormattedDateString()}}</span>

                            <h3 class="timeline-header "><a href="#">Greenhouse</a> Mulai beroprasi</h3>
                          </div>
                        </div>
                        <!-- END timeline item -->
                        <div>
                          <i class="fas fa-clock bg-gray"></i>
                        </div>
                      </div>
                      </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modaldanger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">NONAKTIFKAN GREENHOUSE</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Setelah dinonaktifkan Kosongkan Tandon</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form action="{{$greenhouse->id}}/nonaktif" method="post">
                @csrf
              <button type="submit" class="btn btn-outline-light">NONAKTIFKAN GH</button>
              </form>
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Batal</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
        <div class="modal fade" id="modalinputpanen" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-l">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Input Hasil Panen</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <form action="/greenhouse/{{$greenhouse->id}}/inputpanen" method="post" >
              {{ csrf_field() }}
              <div class="input-group mb-3">
            <input type="number" class="form-control" name="hasil" placeholder="Masukan Hasil panen" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2">Dalam Kg</span>
            </div>
            
            </div>
            <button type="submit" class="btn btn-success col-4">Input Hasil</button>
            </form>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        

@endsection

@section('foot')

<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/zoom/zoomsl.js')}}"></script>
<script src="{{url('/js/detail.js')}}"></script>
<script src="{{url('/zoom/script.js')}}"></script>
@endsection
