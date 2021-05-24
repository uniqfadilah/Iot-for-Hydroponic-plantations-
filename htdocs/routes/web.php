<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login','authController@login')->name('login');
Route::get('/logout','authController@logout');
Route::post('/postlogin','authController@postlogin');
Route::group(['middleware'=>['auth','CheckRole:admin']],function(){
Route::get('/dashboard','dashboardController@index');
Route::resource('/simulasi','simulasiController');
Route::resource('/greenhouse','GreenhouseController');
Route::get('/greenhouse/{greenhouse}/geton','GreenhouseController@geton');
Route::post('/greenhouse/{greenhouse}/geton','GreenhouseController@geton');
Route::post('/simulasi/{greenhouse}/suhu','simulasiController@createsuhu');
Route::post('/simulasi/{greenhouse}/lux','simulasiController@createlux');
Route::post('/simulasi/{greenhouse}/hum','simulasiController@hum');
Route::post('/simulasi/{greenhouse}/tandon','simulasiController@createvolume');
Route::post('/greenhouse/{greenhouse}/getonn','GreenhouseController@getonn');
Route::post('/greenhouse/{greenhouse}/pesanadmin','GreenhouseController@pesanadmin');
Route::post('/greenhouse/{greenhouse}/inputpanen','GreenhouseController@inputpanen');
Route::post('/greenhouse/{greenhouse}/nonaktif','GreenhouseController@nonaktif');

Route::get('/apikelembaban','GreenhouseController@apikelembaban');
Route::resource('/datasayur','datasayurController');
Route::resource('/laporanmonitoring','laporanmonitoringController');
//laporan
Route::resource('/hasilpanen','datahasilpanenController');
Route::get('/lkipas','alatController@kipas');
Route::get('/llampu','alatController@lampu');
Route::get('/lnutrisi','alatController@nutrisi');
//datamaster
Route::get('/newgreenhouse','newGreenhouseController@index');
Route::post('/newgreenhouse','newGreenhouseController@store');
Route::get('/datagh','newGreenhouseController@data');
Route::resource('/dmkipas','KipasController');
Route::resource('/dmlampu','LampuController');
Route::resource('/dmtermo','TermoController');
Route::resource('/dmlux','LuxController');
Route::resource('/dmtandon','TandonController');
Route::post('/edittandon/{id}','tandonController@update');
Route::resource('/dmpompa','pompaController');
Route::post('/editpompa/{id}','pompaController@update');
Route::resource('/pegawai','pegawaiController');
});

Route::group(['middleware'=>['auth','CheckRole:admin,pegawai']],function(){
    Route::get('/dashboard','dashboardController@index');

});
Route::group(['middleware'=>['auth','CheckRole:pegawai']],function(){
    Route::get('/rumahkaca','GreenhouseController@pegawaihalaman');
    Route::post('/laporan/{greenhouse}','GreenhouseController@laporan');
    Route::post('/greenhouse/{greenhouse}/pesan','GreenhouseController@pesanpegawai');
    Route::get('/rumahkaca/{greenhouse}','GreenhouseController@pegawai');
});

Route::get('/simulasi/{greenhouse}','simulasiController@web');
Route::get('/api','GreenhouseController@api');

Route::get('/testapi/{greenhouse}', 'simulasiController@getdata');