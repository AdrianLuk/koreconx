<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    // protected $table = 'emails';

    protected $fillable = ['email'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
