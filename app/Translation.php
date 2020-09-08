<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'translation', 'term_id',
    ];

    public function terms()
    {
        return $this->hasMany('App\Terms');
    }
}
