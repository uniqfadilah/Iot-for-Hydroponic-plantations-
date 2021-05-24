<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logpompa extends Model
{
    protected $table ='logpompa';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function pompa(){
        return $this->belongsTo('App\pompa');
     }
}
