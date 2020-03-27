<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Car;
use App\Models\Booking;
use App\Models\Brand;
use Yajra\Datatables\Datatables;
use Response;
class BookingController extends Controller
{
    

    public function index(){
      $brands=Brand::select("price","id","brand_name")->get();
    	return view("booking",["brands"=>$brands]);

    }


    public function addTrans(Request $req){
           $customer =Customer::where("email",$req->email)->first();
           if($customer){
               $car=Car::where("brand_id",1)->where("available",1)->inRandomOrder()->first();
           	   if($car){
                  try{
                    Booking::create([
                    "customer_id"=>$customer->id,
                    "car_id" =>$car->id,
                    "total"=>$req->total,
                    "rent_start_date"=>$req->start_date,
                    "rent_end_date"=>$req->end_date
                  ]);
                  $car->available=0;
                  $car->save();
                   return Response::json("Data Has Been Added", 200);
                  }catch(Exception $e){
             	   	 return Response::json($e, 500);
                  }  
           	   }else {
                 return Response::json("There Is No Avaible Car", 404);
               }
           }else{
           	   return Response::json("Customer Doesn,t Found", 404);
           }
    }

    public function showTrans(){
    return Datatables::of(Booking::select(
          "Bookings.id","brand_name","police_number","rent_start_date as start","rent_end_date as end","total","email","brand_id","customers.name as customer")
            ->join("cars",'cars.id',"=","Bookings.car_id")->join("customers","customers.id","=","Bookings.customer_id")
            ->join("brands","brands.id","=","cars.brand_id")
            ->get())
            ->addColumn('action','
            <center>
           <a href="#" class="btn btn-danger" onclick="deleteBook({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action','role'])
        ->addIndexColumn()
        ->make(true);
    }


    public  function transProfile($id){
      return Booking::select(
          "Bookings.id","brand_name","police_number","rent_start_date as start","rent_end_date as end","total","email","brand_id","customers.name as customer")
            ->join("cars",'cars.id',"=","Bookings.car_id")->join("customers","customers.id","=","Bookings.customer_id")
            ->join("brands","brands.id","=","cars.brand_id")->where("Bookings.id",$id)->first();
    }

    public function deleteBook($id){
      $booking=Booking::find($id);
      $car=Car::find($booking->car_id);
      $car->rent_start_date=null;
      $car->rent_end_date=null;
      $car->available=1;
      $booking->delete();
    return Response::json("Data Has Been Remove", 200);

    }
}
