<?php
namespace App\Helpers;
use App\User;
use App\Models\ReservationOption;
use App\Models\NewsletterJob;
use App\Models\Company;
use App\Models\Preference;
use Carbon\Carbon;
use Mail;
use DB;
use URL;

class DealHelper
{

  /**
   * Sends the newsletter to the subscribed user.
   */
  public static function sendNewsletterEmail(){
    $newsletter = new DealHelper;
    $jobs = $newsletter->getNewsletter();
  }

  /**
   * Gets the newsleter to be sent on current day and time.
   * @return newsletterArray.
   */
  private function getNewsletter()
  {
    $newsletterJobs = NewsletterJob::all()->where('status',1);
    $newsletters = [];
    foreach ($newsletterJobs as $job) {
      # code...
      $data = $this->getDateTime(json_decode($job->date),json_decode($job->time));
      if($data){
        $deals = $this->getDeals($job->city_id);
        $users = $this->getSubscribedUsers($job->city_id);
        $this->sendDealsToUser($deals,$users);
      }
    }
  }

  /**
   * Gets the date and time of the newsletter.
   * @param $dateArray, $timeArray
   * @return boolean true/false
   */
   private function getDateTime($dateArray=[],$timeArray=[])
   {
     # code...
     $dt = Carbon::now();
     $day = strtolower($dt->format('l'));
     $hour = $dt->hour;
     $dateTime = [];
     foreach ($dateArray as $key => $value) {
       # code...
       if($value==trans("app.$day")){
         $date = $value;
         $time = !empty($timeArray[$key]) ? $timeArray[$key].":00" : "00:00:00";
         if(intval($time) >= intval($hour) && intval($time) < intval($hour)+1){
           return true;
         }
       }
     }
     return false;
   }

   /**
    * Gets the related deals from the city.
    * @param int $city_id
    * @return array $deals.
    */
  private function getDeals($city_id)
  {
    # code...
    $data = Company::where('regio','LIKE','%"'.$city_id.'"%')->get(['id','name','slug','regio']);
    foreach ($data as $company) {
      # code...
      $deals[$company->slug] = DB::table('reservations_options')->where([['company_id',$company->id],['newsletter', 1]])->get();
    }
    return $deals;
  }

  /**
   * Gets the list of users who subscribed to the city newsletter.
   * @param int $city_id
   * @return array $users.
   */
  private function getSubscribedUsers($city_id)
  {
    # code...
    $users = DB::table('users')->where([['city','LIKE','%"'.$city_id.'"%'],['newsletter',1]])->get(['email','name','saldo','extension_downloaded']);
    return $users;
  }

  /**
   * Queue Mail for sending deals.
   * @param array $deals, $users
   */
  private function sendDealsToUser($deals=[],$users=[])
  {
    # code...
    if(!empty($deals) && !empty($users)){
      foreach ($users as $user) {
        # code...
        Mail::queue('emails.deals',['user' => $user,'deals' => $deals],function($message) use ($user){
          $message->to($user->email)->subject('UW Voordeelpas - De beste deals');
        });
      }
    }
  }

}
