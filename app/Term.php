<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    protected $fillable = [
        'name', 'dictionary_id',
    ];

    public function translations()
    {
        return $this->hasMany('App\Translation');
    }
}
