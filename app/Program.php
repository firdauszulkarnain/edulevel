<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use SoftDeletes;

    // Fillable = Yang Boleh Diisi
    // protected $fillable = [];
    // Guarded = Yang Tidak Boleh Diisi
    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    public function edulevel()
    {
        return $this->belongsTo('App\Edulevel');
    }
}
