<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    protected $fillable = [
        'description',
    ];

    public function terms()
    {
        return $this->hasMany('App\Term');
    }
}
