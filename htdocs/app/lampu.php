<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lampu extends Model
{
    protected $table ='lampu';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function lampu(){
       return $this->BelongsTo('App\greenhouse');
    }
    public function loglampu(){
        return $this->HasMany('App\loglampu');
     }
    public function getloglampu(){
        return $this->HasOne('App\loglampu')->orderBy('id','desc');
     }

}
