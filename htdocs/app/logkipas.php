<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logkipas extends Model
{
    protected $table ='logkipas';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function pompa(){
        return $this->belongsTo('App\kipas');
     }
}
