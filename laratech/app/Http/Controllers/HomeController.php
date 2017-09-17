<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;

use Illuminate\Http\Request;
use App\SmsTemplate;
require_once '../Twilio/autoload.php';
use Twilio\Rest\Client;
use Twilio\Twiml;
use DB;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    private function createMessage($phone, $message)
    {
        $subscriber = SmsTemplate::where('+12568264404', $phone)->first();
        if ($subscriber) {
            return $this->generateOutputMessage($subscriber, $message);
        }

        $subscriber = new SmsTemplate;
        $subscriber->phoneNumber = $phone;
        $subscriber->subscribed  = false;

        $subscriber->save();

        return trans('subscription.thanks');
    }



    public function send_sms(){

    $sid = 'ACefca5b03d9b63fab47891206984cd7a6';
    $token = '678178d623cb44a3cb21596bb434df35';
    $client = new Client($sid, $token);

    $message = Input::get('msg');
    $to_phno=Input::get('phone');
    $country_code = Input::get('c_code');
    $from_phno='+12568264404';

    $client->messages->create($country_code.$to_phno,array('from' => $from_phno,'body' => $message));
    echo $message;

    $subscriber = SmsTemplate::where('phone', $to_phno)->first();
        if ($subscriber) {
            return $this->generateOutputMessage($subscriber, $message);
        }

        $subscriber = new SmsTemplate;
        $subscriber->subject = 'sdss';
        $subscriber->phone  = $to_phno;
        $subscriber->content  = "hh";
        $subscriber->category  = "jj";
        $subscriber->company_id  = '1';
        $subscriber->explanation  = "jj";
        $subscriber->type  = "sms";        
        $subscriber->is_active  = 1;

        $subscriber->save();

        return trans('subscription.thanks');

    }


    public function count()
           {
               $count = DB::table('sms_templates')
               ->where('is_active', '1')
               ->count();
               dd($count);

           }


    public function push_sms(){

    $sid = 'ACefca5b03d9b63fab47891206984cd7a6';
    $token = '678178d623cb44a3cb21596bb434df35';
	$serviceSid = "ISc0854ed64921065bd4ee915045df9de0";

    $to_phno='+91'.Input::get('phone');
    // Initialize the client
	$client = new Client($sid, $token);
    
        // Create a binding
        $binding = $client->notify->v1->services($serviceSid)
            ->bindings->create(
                '00000001', // We recommend using a GUID or other anonymized identifier for Identity.
                'sms',
                $to_phno
            );
        // Create a notification
       $notification = $client->notify->v1->services($serviceSid)
            ->notifications->create([
                "toBinding" => '{"binding_type":"sms", "address":"'.$to_phno.'"}',
                'body' => 'Knok-Knok! This is your first Notify SMS'
            ]);


       echo 'Notification Successfully send'; //

    }
    public function call_no(){

    $sid = 'ACefca5b03d9b63fab47891206984cd7a6';
    $token = '678178d623cb44a3cb21596bb434df35';
    $client = new Client($sid, $token);

    $to_phno=Input::get('phone');
    $country_code = Input::get('c_code');
    $from_phno='+12568264404';

    $call = $client->calls->create(
    $country_code.$to_phno, "+12568264404",
      array("url" => "http://vps137395.vps.ovh.ca/laratech/process.php")//voice message
    );

    // return a JSON response
    return array('message' => 'Call incoming!');

    }

    public function multi_sms()
    {

    $sid = 'ACefca5b03d9b63fab47891206984cd7a6';
    $token = '678178d623cb44a3cb21596bb434df35';
    $client = new Client($sid, $token);

    $message = Input::get('msg');
    $multinumber=Input::get('multinumber');
    $from_phno='+12568264404';
    $count_number=count($multinumber);
    $i=0;
    for($i; $i<$count_number; $i++)
    {
    	//echo $multinumber[$i];
    	$client->messages->create($multinumber[$i],array('from' => $from_phno,'body' => $message));
    
    	
    }
    echo $message;


    }
}
