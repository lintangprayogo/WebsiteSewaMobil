<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Yajra\Datatables\Datatables;
use Response;


class CustomerController extends Controller
{

public function index(){
  return view("customer");
}

public function deleteCustomer($id){
   $customer=Customer::find($id);
   $customer->delete();
   return Response::json("Data Has Been Deleted", 200);
}


public function addCustomer(Request $req){
 $customer=Customer::where("phone",$req->phone)->orWhere("email",$req->email)->first();
if($customer){
     return Response::json("Data NIK OR Email OR Phone Already Used", 402);
}else{
      Customer::create([
                    'name'=>$req->name,
                    'email'=>$req->email,
                    "address"=>$req->address,
                    "phone"=>$req->phone,
                    "nik"=>$req->nik
                ]);
       }
   return Response::json("Data Has Been Added", 200);

}

public function editCustomer(Request $req){
  return $req;
  $customer=Customer::find($req->id);
  $customerCheck=Customer::where("phone",$req->phone)->orWhere("email",$req->email)->first();

  if($customerCheck && $customerCheck !=$customer){
       return Response::json("Data NIK OR Email OR Phone Already Used", 402);
  }else{
        $customer->name=$req->name;
        $customer->email=$req->email;
        $customer->address=$req->address;
        $customer->phone=$req->phone;
        $customer->nik=$req->nik;
        $customer->save();
      }

   return Response::json("Data Has Been Change", 200);

}


public function profileCustomer($id){
  $customer=Customer::find($id);
  return $customer;
}
    
public function showCustomer(){
      return Datatables::of(Customer::get())
        ->addColumn('action','
            <center>
            <a href="#"  data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-cus"  data-toggle="modal" data-target="#formModal">
            <i class="fa fa-edit"></i>
            
            </a>
           
           <a href="#" class="btn btn-danger" onclick="deleteCus({{$id}})"><i class="fa fa-trash"></i>
           </a>
              </center>')
        ->rawColumns(['action','role'])
        ->addIndexColumn()
        ->make(true);
      make(true);
    }

}
