<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datasayur extends Model
{
    protected $table ='datasayur';
    protected $guarded=['id'];
   
    public function datasayur(){
        return $this->hasMany('App\greenhouse')->orderBy('id','desc');
     }

}
