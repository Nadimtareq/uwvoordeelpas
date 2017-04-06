<?php
/**
 *  TodayDevelopment
 */

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiController extends Controller
{

    public function getUsers($key)
    {
        $users = User::all();

        if ($key == env('API_KEY')) {
            return $users->toJson();
        } else {
            return "ACCES DENIED";
        }
    }

    public function getAffiliates($key)
    {
        $affiliates = Affiliate::where('no_show', 0)->get();

        if ($key == env('API_KEY')) {
            return $affiliates->toJson();
        } else {
            return "ACCES DENIED";
        }
    }
}
