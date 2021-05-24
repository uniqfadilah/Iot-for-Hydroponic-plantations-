<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class greenhouse extends Model
{
   protected $table ='greenhouse';
   protected $guarded=['id'];

   
   public function penanggungjawab(){
     return $this->belongsTo('App\penanggungjawab');
    }
    
    public function termometer(){
     return $this->belongsTo('App\termometer');
   }
    public function kipas(){
     return $this->belongsTo('App\kipas');
   }
    public function tandon(){
     return $this->belongsTo('App\tandon');
   }
    public function hasilpanen(){
     return $this->hasMany('App\hasilpanen')->orderBy('id','desc');
   }
    public function datatanam(){
     return $this->hasOne('App\datatanam')->orderBy('id','desc');
   }
    public function pesan(){
     return $this->hasMany('App\pesan');
   }
    public function laporan(){
     return $this->hasMany('App\laporan')->orderBy('id','desc');
   }
 
    
    public function luxmeter(){
     return $this->belongsTo('App\luxmeter');
   }
    public function datasayur(){
     return $this->belongsTo('App\datasayur');
   }
    public function lampu(){
     return $this->belongsTo('App\lampu');
   }

   public function getub(){
    DB::table('greenhouse')->orderBy('id','DESC')->get();
  }
}