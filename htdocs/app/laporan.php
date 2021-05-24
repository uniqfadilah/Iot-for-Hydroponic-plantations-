<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    protected $table ='laporan';
    protected $primaryKey = 'id';
    protected $guarded=['id'];
    public function greenhouse(){
        return $this->BelongsTo('App\greenhouse');
     }
}
