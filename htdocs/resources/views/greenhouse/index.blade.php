@extends('/layout/main')

@section('title','Halaman Green House')
@section('greenhouse','active')
@section('namahalaman','Daftar Green House')

@section('container')
<div class="container-fluid">
@include('sweetalert::alert')
<div class="row">
  
@foreach($greenhouse as $gh)

        @if($gh->status=='1')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$gh->kode}}</h3>
                <p>  
                {{$gh->penanggungjawab->nama}}
                </p>
              </div>
              <div class="icon">
                <i class="fa fa-home"></i>
              </div>
              <a href="/greenhouse/{{$gh->id}}" class="small-box-footer" target="_blank">Klik untuk detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          @else

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$gh->kode}}</h3>

                <p>SEDANG TIDAK DIGUNAKAN!</p>
              </div>
              <div class="icon">
                <i class="fa fa-warehouse"></i>
              </div>
              <a href='/greenhouse/{{$gh->id}}/edit' class="small-box-footer">Mulai tanam <i class="fas fa-arrow-circle-right" ></i></a>
            </div>
          </div>
          
          
          @endif
@endforeach
        </div>
        </div>
        </div>
        </div>

@endsection

