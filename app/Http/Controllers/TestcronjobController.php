<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Helpers\DealHelper;

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
    }
}
