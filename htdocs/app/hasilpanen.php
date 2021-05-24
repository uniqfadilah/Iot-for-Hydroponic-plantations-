<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hasilpanen extends Model
{
  protected $table ='hasilpanen';
    protected $guarded=['id'];
  
     
    public function greenhouse(){
        return $this->belongsTo('App\greenhouse');
      }

}
