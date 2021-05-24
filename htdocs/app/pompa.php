<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pompa extends Model
{
    protected $table ='pompa';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function tandon(){
       return $this->belongsto('App\tandon');
    }
    public function logpompa(){
       return $this->HasOne('App\logpompa')->orderBy('id','desc');
    }
    public function logspompa(){
       return $this->HasMany('App\logpompa')->orderBy('id','desc');
    }
}
