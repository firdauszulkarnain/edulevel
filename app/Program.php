<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    // protected $hidden = ['created_at'];
    public function edulevel()
    {
        return $this->belongsTo('App\Edulevel');
    }
}
