<?php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Phoenix\EloquentMeta\MetaTrait;
use DB;

class Transaction extends Model
{
    use MetaTrait;

    protected $table = 'transactions';
    
    protected $guarded = array();

    public function getCreatedAt() {
        return date('d-m-Y', strtotime($this->created_at));
    }

    /**
     * @author Soufyane Kaddouri - TodayDevelopment
     */
    public function getExpiredDate() {
        // Een functie die 90 dagen bij de created_at datum toevoegd
        return Carbon::createFromTimestamp(strtotime($this->created_at))->addDays(90)->format('d-m-Y');
    }

}
