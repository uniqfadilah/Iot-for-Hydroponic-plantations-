<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datatanam extends Model
{
    protected $table ='datatanam';
    protected $guarded=['id'];
    protected $dates = ['prediksipanen'];
    public function greenhouse(){
        return $this->BelongsTo('App\greenhouse')->orderBy('id','desc');
     }

}
