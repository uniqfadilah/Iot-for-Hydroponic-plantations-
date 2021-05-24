<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loglampu extends Model
{
    protected $table ='loglampu';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function lampu(){
        return $this->belongsTo('App\lampu');
     }
}
