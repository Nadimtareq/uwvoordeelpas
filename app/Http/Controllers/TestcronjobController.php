<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helpers\DealHelper;
use App\Models\GuestThirdParty;
use App\User;
use Sentinel;
use Setting;

class TestcronjobController extends Controller
{
    //
    public function index()
    {
      DealHelper::sendNewsletterEmail();
    }

    public function test() {
    	mail("rushabhmadhu@gmail.com","croncalled","newslater cron");
    	DealHelper::sendNewsletterEmail();
    	echo "test";
    	exit;
    }
    public function guestMigrate(){
        $thirdParty = GuestThirdParty::select()
            ->get()
            ->toArray();
        $default_city = array(Setting::get('website.regio'));
        $new_record = 0;
        $existing_record = 0;
        if(!empty($thirdParty)) {
            foreach ($thirdParty as $key => $value) {
                $email = $value['email'];
                $default_password = 123456;
                $check_user_exists = User::where('email', $email)->exists();
                if(empty($check_user_exists)) {
                    
                    $name = $value['name'];
                    if(!empty($email)) {
                        $data = Sentinel::registerAndActivate(array(
                            'email' => $email,
                            'password' =>  $default_password
                        ));
                        
                        $data->name = $value['name'];
                        $data->phone = $value['phone'];
                        $data->city = json_encode($default_city);
                        $data->expire_code = str_random(64);
                        $data->expired_at = date('Y-m-d H:i', strtotime('+2 hours')).':00';
                        $data->terms_active = 1;
                        $data->save();
                        echo "Data saved to database<br/>";
                        $new_record++;
                    } else {
                        echo "Data already exists<br/>";
                        $existing_record++;
                    }
                    ob_flush(); # http://php.net/ob_flush
                    flush(); # http://php.net/flush
                    sleep(0.5);
                }
            }
        }
        echo "Report of All the Records<br/>New Records : $new_record<br/>Existing Records : $existing_record";exit;
    }
}
