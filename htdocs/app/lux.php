<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lux extends Model
{
    protected $table ='lux';
    protected $guarded=['id'];
    public function getlux(){
       return $this->belongTo('App\intensitascahaya');
    }
}
