<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationOption extends Model
{

    protected $table = 'reservations_options';

    /**
     * Get the phone record associated with the user.
     */
    public function company()
    {
//        return $this->hasOne('App\Models\Company');
        return $this->hasOne('App\Models\Company', 'id', 'company_id')->first();
    }
}