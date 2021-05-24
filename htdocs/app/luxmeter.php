<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class luxmeter extends Model
{
    protected $table ='luxmeter';
    protected $guarded=['id'];
    
    public function luxmeter(){
       return $this->hasOne('App\greenhouse');
    }
    public function getlux(){
        return $this->hasOne('App\lux')->orderBy('id','desc');
     }
    public function lux(){
        return $this->hasMany('App\lux')->orderBy('id','desc');
     }
}