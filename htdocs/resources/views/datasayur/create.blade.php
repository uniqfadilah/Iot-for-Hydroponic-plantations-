@extends('layout/main')

@section('title','Halaman Data Sayur')

@section('container')

<div class="container">
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="card card-primary">
              <div class="card-header mb-3">
                <h3 class="card-title">Tambah data sayur</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
              <form action="/datasayur" method="post">
              @csrf
                <div class="card-body">
                <div class="row ">

                  <div class="col-3">
                  <label >NAMA SAYUR</label>
                    <input type="text" class="form-control" placeholder="" name="namasayur">
                  </div>
                  <div class="col-3">
                  <label >UMUR PANEN</label>
                    <input type="text" class="form-control" placeholder="HARI" name="umurpanen">
                  </div>
                  <div class="col-3">
                  <label >NUTRISI OPTIMAL</label>
                    <input type="text" class="form-control" placeholder="LITER" name="nutrisiopt">
                  </div>
                
                  <div class="col-3  mb-3">
                  <label >SUHU OPTIMAL</label>
                    <input type="text" class="form-control" placeholder="°C" name="suhuopt">
                  </div>
                
                  <div class="col-3">
                  <label >KELEMBABAN OPTIMAL</label>
                    <input type="text" class="form-control" placeholder="%" name="kelembabanopt">
                  </div>
                  <div class="col-3">
                  <label >INTENSITAS OPTIMAL</label>
                    <input type="text" class="form-control" placeholder="LUX" name="luxopt">
                  </div>
                
                
                </div>
                  </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection
