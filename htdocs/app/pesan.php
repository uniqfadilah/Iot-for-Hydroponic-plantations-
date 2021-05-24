<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    protected $table ='pesan';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function greenhouse(){
       return $this->belongsTo('App\greenhouse');
    }
}
