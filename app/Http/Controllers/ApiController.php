<?php

namespace App\Http\Controllers;

use App\Models\Affiliate;
use App\Helpers\AffiliateHelper;
use App\User;
use Illuminate\Http\Request;
use Sentinel;
use App\Http\Requests;

class ApiController extends Controller {

    public function checkAuth() {
        $return_user = $current_user = $default_user = '';
        $current_user = Sentinel::getUser();
        if ($current_user) {
            $return_user = $current_user;
        } else {
            $default_user = User::where('email', 'martijn@uwvoordeelpas.nl')->first();
            $return_user = $default_user;
        }
        return $return_user;
    }

    public function findProgram($userId, $url) {
        $domain = preg_replace('/^www\./', '', $url);
//        $urlPieces = explode('.', $domain);

//        $affiliate = Affiliate::where('no_show', 0)
//                ->where('affiliates.name', 'LIKE', '%' . $urlPieces[0] . '%')
//                ->first()
//        ;
        

          $affiliate = Affiliate::where('no_show', 0)
                ->where('affiliates.link', 'LIKE', '%' . $domain . '%' )
                ->first();
      
        if (count($affiliate) == 1) {
            $affiliateHelper = new AffiliateHelper();

            $jsonArray = array(
                'name' => $affiliate->name,
                'url' => $affiliateHelper->getAffiliateUrl($affiliate, $userId)
            );

            return json_encode($jsonArray);
        }
    }

    public function getUsers($key) {
        $users = User::all();

        if ($key == env('API_KEY')) {
            return $users->toJson();
        } else {
            return "ACCES DENIED";
        }
    }

    public function getAffiliates($key) {
        $affiliates = Affiliate::where('no_show', 0)->get();

        if ($key == env('API_KEY')) {
            return $affiliates->toJson();
        } else {
            return "ACCES DENIED";
        }
    }

    public function getAffiliatesUrl() {
        $aff_array = array();
        $affiliates = Affiliate::where('no_show', 0)->select('name')->get();
        foreach ($affiliates as $affiliate) {            
            $aff_array[] = mb_strtolower($affiliate['name']);
        }
        $aff_array = array_filter($aff_array);
        return json_encode($aff_array);        
    }

}
