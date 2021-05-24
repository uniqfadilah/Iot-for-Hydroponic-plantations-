<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class termometer extends Model
{
    protected $table ='termometer';
    protected $guarded=['id'];
    
    public function greenhouse(){
       return $this->hasOne('App\greenhouse');
    }
    public function getsuhu(){
       return $this->hasOne('App\suhu')->orderBy('id','desc');
    }
    public function suhu(){
       return $this->hasMany('App\suhu')->orderBy('id','desc');
    }
    public function kelembaban(){
       return $this->hasOne('App\kelembaban')->orderBy('id','desc');
    }
    public function lembab(){
       return $this->hasMany('App\kelembaban')->orderBy('id','desc');
    }
}
