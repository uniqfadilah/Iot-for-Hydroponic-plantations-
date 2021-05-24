<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class suhu extends Model
{
    protected $table ='suhu';
    protected $guarded=['id'];
    public function gettermometer(){
        
       return $this->belongsTo('App\termometer');
       
    }
}
