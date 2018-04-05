<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //
    // protected $table = 'emails';
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['email', 'is_default'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
