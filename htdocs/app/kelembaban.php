<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelembaban extends Model
{
    protected $table ='kelembaban';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function termometer(){
       return $this->belongsTo('App\termometer');
    }
}
