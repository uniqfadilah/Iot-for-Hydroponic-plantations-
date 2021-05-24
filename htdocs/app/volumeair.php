<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class volumeair extends Model
{
    protected $table ='volumeair';
    protected $guarded=['id'];
    public function tandon(){
        
       return $this->hasOne('App\tandon');
       
    }
}
