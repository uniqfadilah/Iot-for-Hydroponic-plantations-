@extends('/layout/main')

@section('title','Halaman Green House')
@section('container')

<div class="container">
<div class="row">
@include('sweetalert::alert')           
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modalsuhu"><i class="fa fa-thermometer-half"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Suhu</span>
                <span class="info-box-number">{{$greenhouse->termometer->getsuhu['suhu']}}°C</span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </div>
          @if($volumetandon<$volumepengisian)
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger" type="button" data-toggle="modal" data-target="#modaltandon"><i class="fa fa-water"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">TANDON ERROR</span>
                <span class="info-box-number">SEGERAPERIKSA!!</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @else
          @if($greenhouse->tandon->pompa['status']=='0')
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modaltandon"><i class="fa fa-water"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Volume tandon</span>
                <span class="info-box-number">{{$greenhouse->tandon->volumeair->volume/$greenhouse->tandon->volume_tandon*100}} %</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @elseif($greenhouse->tandon->pompa['status']=='1')
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning" type="button" data-toggle="modal" data-target="#modaltandon"><i class="fa fa-water"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Volume tandon</span>
                <span class="info-box-number">Mengisi ulang!!</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endif
          @endif
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modalkelembaban"><i class="fa fa-tint"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Kelembaban</span>
                <span class="info-box-number">{{$greenhouse->termometer->kelembaban['kelembaban']}} %</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info" type="button" data-toggle="modal" data-target="#modalintensitas"><a href="#"><i class="fa fa-adjust"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">Intensitas Cahaya</span>
                <span class="info-box-number">{{$greenhouse->luxmeter->getlux['lux']}} lux</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @if($greenhouse->kipas->status=='1')
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning" type="button" data-toggle="modal" data-target="#modalkipas"><i class="far fa-sun"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Status Kipas</span>
              <span class="info-box-number">Aktif</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @else
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-secondary" type="button" data-toggle="modal" data-target="#modalkipas"><i class="far fa-sun"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Status Kipas</span>
              <span class="info-box-number">Mati</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endif
          @if($greenhouse->lampu['status']=='1')
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning" type="button" data-toggle="modal" data-target="#modallampu"><i class="far fa-lightbulb"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Status lampu</span>
              <span class="info-box-number">Aktif</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
        @else
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-secondary" type="button" data-toggle="modal" data-target="#modallampu"><i class="far fa-lightbulb"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Status lampu</span>
              <span class="info-box-number">Mati</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endif
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success" type="button" data-toggle="modal" data-target="#modalsayur"><i class="fas fa-leaf"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sayur yang ditanam</span>
                <span class="info-box-number">{{$greenhouse->datasayur->namasayur}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <div class="col-md-3 col-sm-4 col-lg-6">
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
                        <img class="direct-chat-img" src="{{url('dist/img/pekerja/'.auth()->user()->penanggungjawab->gambar)}}" alt="message user image">
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
                    <form action="/greenhouse/{{$greenhouse->id}}/pesan" method="post">
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
                <button data-toggle="modal" data-target="#modallaporan" class="btn btn-success col-12 ">BUAT LAPORAN!</button>
              </div>
<!-- modals -->
        <div class="modal fade" id="modalsuhu" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Suhu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-12">
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
                  <div class="col-12">
                      <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 250px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>WAKTU</th>
                                <th>SUHU</th>
                                <th>STATUS</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($suhu as $suhu)
                              <tr>
                                <td>{{$suhu->created_at->format('H:i:s')}}</td>
                                <td>{{$suhu->suhu}}°C</td>
                                @if($suhu->suhu<$greenhouse->datasayur->suhuopt)
                                <td><span class="tag tag-success">Normal</span></td>
                                @else
                                <td><span class="tag tag-success">Terlalu Panas</span></td>
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
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">tandon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
              <div class="col-12">
                  @if($greenhouse->tandon->pompa['status']=='0')
                  <div class="info-box mb-3 col-sm-5 bg-info ">
                    <span class="info-box-icon"><i class="fa fa-water"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Volume Air</span>
                      <span class="info-box-number">{{$greenhouse->tandon->volumeair->volume/$greenhouse->tandon->volume_tandon*100}}%</span>
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
                    <div class="col-12">
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
                            @foreach($logtandon as $log)
                              <tr>
                                <td>{{$log->created_at->toFormattedDateString()}}</td>
                                <td>{{$log->created_at->toTimeString()}}</td>
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
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Kelembaban</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
                    
                 
                    <div class="col-12">
                  <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="fas fa-tint"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Kelembaban</span>
                      <span class="info-box-number">{{$greenhouse->termometer->kelembaban['kelembaban']}} %</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="fa fa-leaf"></i></span>

                    <div class="info-box-content">
                      <span class="info-box-text">Kelembaban Optimal</span>
                      <span class="info-box-number">{{$greenhouse->datasayur['kelembabanopt']}}%</span>
                    </div>
                  </div>
                  @if($greenhouse->termometer->kelembaban['kelembaban']<$greenhouse->datasayur['kelembabanopt'])
                  <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Greenhouse Kering</span>
                      <span class="info-box-number">{{$greenhouse->termometer->kelembaban['kelembaban']-$greenhouse->datasayur['kelembabanopt']}}%</span>
                    </div>
                  </div>
                  @endif
                  <div class="col-12">
                      <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 250px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>WAKTU</th>
                                <th>Hum</th>
                                <th>STATUS</th>
                              </tr>
                            </thead>
                            <tbody>
                           
                            @foreach($greenhouse->termometer->lembab as $kelembaban)
                              <tr>
                                <td>{{$kelembaban->created_at->format('H:i:s')}}</td>
                                <td>{{$kelembaban->kelembaban}} %</td>
                                @if($kelembaban['kelembaban']>$greenhouse->datasayur['kelembabanopt'])
                                <td>Lembab</span></td>
                                @else
                                <td>Kering</span></td>
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
                    
                   
                    <div class="col-12">
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
                  <div class="col-12">
                      <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 340px;">
                          <table class="table table-head-fixed text-nowrap">
                            <thead>
                              <tr>
                                <th>WAKTU</th>
                                <th>Hum</th>
                                <th>STATUS</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($greenhouse->luxmeter->lux as $lx)
                              <tr>
                                <td>{{$lx->created_at->format('H:i:s')}}</td>
                                <td>{{$lx->lux}}Lux</td>
                                @if($lx->lux>$greenhouse->datasayur['luxopt'])
                                <td>Cahaya cukup</td>
                                @else
                                <td>Cahaya kurang</td>
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
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Detail Kipas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
              <div class="row">
                    
                    
                  @if($greenhouse->kipas->status=='1')
                  <div class="col-sm">
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
                <div class="col-sm">
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
                <div class="col-sm">
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
                           
                              <tr>
                                <td>{{$kps->created_at->format('d-m-y')}}</td>
                                <td>{{$kps->created_at->format('H:i:s')}}</td>
                                <td>{{$kps->updated_at->format('H:i:s')}}</td>
                                <td>{{$kps->updated_at->diff($kps->created_at)->format('%H Jam %I Menit %S')}}</td>
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
                    
                   
                  @if($greenhouse->lampu->status=='1')
                  <div class="col-12">
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
                <div class="col-12">
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
                <div class="col-12">
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
                           
                              <tr>
                                <td>{{$lmp->created_at->format('d-m-y')}}</td>
                                <td>{{$lmp->created_at->format('H:i:s')}}</td>
                                <td>{{$lmp->updated_at->format('H:i:s')}}</td>
                                <td>{{$lmp->updated_at->diff($lmp->created_at)->format('%H Jam %I Menit %S')}}</td>
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
          <div class="modal-dialog modal-sm">
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
                <h4 class="modal-title">LOG suhu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modallaporan" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Buat Laporan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="/laporan/{{$greenhouse->id}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
              <label>Pilih jenis Laporan</label>
                  <div class="input-group mb-3">
                    <select class="custom-select" id="inputGroupSelect02" name='jenis'>
                      <option selected>Jenis Laporan</option>
                      <option value="1">Hama dan Penyakit</option>
                      <option value="2">Teknis</option>
                      <option value="3">Laporan Pekerjaan</option>
                    </select>
                    </div>
                    <label>Keterangan</label>
                <div class="input-group">
                  <input type='text' class="form-control" aria-label="With textarea" name='ket'></input>
                </div>
                  
                      <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" accept="image/*" id="exampleInputFile" name="gambar" >
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                              </div>
                            </div>
                          </div>
                  
                  <label>Detail Laporan</label>
                <div class="input-group">
                  <textarea class="form-control" aria-label="With textarea" name="detail"></textarea>
                </div>
                <button type="submit" class="btn btn-primary mt-4 col-12">Kirim</button>
                </div> 
                </form>
                <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="modalinputhasilpanen" style="display: none;" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">LOG suhu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        

@endsection
@section('foot')
<script src="{{url('/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
@endsection