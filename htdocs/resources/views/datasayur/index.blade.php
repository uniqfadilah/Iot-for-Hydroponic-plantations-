@extends('layout/main')

@section('title','Halaman Data Sayur')
@section('kelola','menu-open')
@section('datasayur','active')

@section('container')

<div class="container">

          <div class="col-12 ">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kelola data sayur CV. Kebun Cimacan</h3>
                

                <div class="card-tools">
                <form action="" method="get">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="search" class="form-control float-right" placeholder="cari data..">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>Nama Sayur</th>
                      <th>Umur Panen</th>
                      <th>Nutrisi Optimal</th>
                      <th>Suhu Optimal</th>
                      <th>Kelembaban Optimal</th>
                      <th>Lux Optimal</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($datasayur as $syr)
                    <tr>
                      <td>{{$syr->namasayur}}</td>
                      <td>{{$syr->umurpanen}} HARI</td>
                      <td>{{$syr->nutrisiopt}} cc/Liter</td>
                      <td>{{$syr->suhuopt}} °C</td>
                      <td>{{$syr->kelembabanopt}} %</td>
                      <td>{{$syr->luxopt}} lux</td>
                      <td>
                        <a href="" class="badge badge-success">Edit</a>
                        <a href="" class="badge badge-danger">Hapus</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                
              </div>
              
              <!-- /.card-body -->
            </div>
            <a href="/datasayur/create"class="btn btn-primary ">Tambah data sayur</a>
            <!-- /.card -->
            
          </div>
        
        </div>

@endsection
