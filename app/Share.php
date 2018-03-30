<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'company_name',
       'share_instrument_name',
       'quantity',
       'price',
       'total_investment',
       'certificate_number',
    ];
     public function user()
    {
        return $this->belongsTo('App\User');
    }
}
