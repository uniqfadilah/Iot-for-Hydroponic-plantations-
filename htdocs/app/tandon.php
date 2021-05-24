<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tandon extends Model
{
    protected $table ='tandon';
    protected $guarded=['id'];
    public function greenhouse(){
       return $this->hasOne('App\greenhouse');
       
    }
    public function volumeair(){
        return $this->hasOne('App\volumeair')->orderBy('id','desc');
     }
    public function pompa(){
        return $this->hasOne('App\pompa')->orderBy('id','desc');
     }
    
}
