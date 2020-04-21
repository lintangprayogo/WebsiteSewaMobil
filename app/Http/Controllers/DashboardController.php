<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index(){
        $cars_available   = DB::table('cars')->where("available","=",1)->count();
        $cars_unavailable = DB::table('cars')->where("available","=",0)->count();
        $customers = DB::table('customers')->count();
        $month=date('n');
        $income=DB::table("bookings")->whereMonth('created_at', '=', $month)->get()->sum("total");
     
        return view("home",["cars_available"=>$cars_available,"cars_unavailable"=>$cars_unavailable,"customers"=>$customers,"income"=>$income]);
       
        
    }
}
