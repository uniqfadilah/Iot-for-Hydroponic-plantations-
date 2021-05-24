@extends('/layout/main')

@section('title','Halaman Green House')
@section('namahalaman','Daftar Green House')

@section('container')
<div class="container-fluid">
@if (session('status'))
    <div class="alert alert-danger">
      GREENHOUSE  {{ session('status') }} DINONAKTIFKAN
    </div>   
@endif
<div class="row">

@foreach( auth()->user()->penanggungjawab['greenhouse'] as $gh)

        @if($gh->status=='1')
          <div class="col-lg-3 col-8">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$gh->kode}}</h3>
                <p>  
                {{$gh->penanggungjawab->nama}}
                </p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
              <a href="/rumahkaca/{{$gh->id}}" class="small-box-footer">Klik untuk detail <i class="fas fa-arrow-circle-right"></i></a>
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
                <i class="ion ion-power"></i>
              </div>
              <div class="small-box-footer"><i class="ion ion-power" ></i></a>
            </div>
          </div>
          
          
          @endif
@endforeach
        </div>
        </div>
        </div>
        </div>

@endsection
