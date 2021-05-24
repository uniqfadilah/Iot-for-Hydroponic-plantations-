<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class penanggungjawab extends Model
{
    protected $table ='penanggungjawab';
    protected $guarded =['id'];

    public function greenhouse(){
       return $this->hasMany('App\greenhouse');
    }
    public function user(){
       return $this->belongsTo('App\User');
    }
}
