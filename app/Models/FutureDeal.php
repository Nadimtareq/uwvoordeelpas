<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FutureDeal extends Model
{
    protected $table = 'future_deals';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
