<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kipas extends Model
{
    protected $table ='kipas';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function greenhouse(){
       return $this->hasOne('App\greenhouse');
    }
    public function logkipas(){
        return $this->HasMany('App\logkipas');
     }
    public function getlogkipas(){
        return $this->HasOne('App\logkipas')->orderBy('id','desc');
     }
}

