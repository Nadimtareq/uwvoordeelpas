<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DevelopmentController extends Controller
{

    public function __construct(Request $request)
    {

    }

    public function index()
    {
//        $routeCollection = Route::getRoutes();
//
//        foreach ($routeCollection as $value) {
//            echo $value->getPath();
//        }

        return view('company-list');



    }
}
