<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = array('album_id','description','title','size','photo');

    public function album()
    {
       return $this->belongsTo('App\Album');
    }
}
