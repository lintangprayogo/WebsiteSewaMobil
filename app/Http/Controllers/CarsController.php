<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Car;
use Response;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Validator;
use Excel;
use App\Exports\CarAvailableExport;
use App\Exports\CarUnavailableExport;

class CarsController extends Controller
{
    

    public function index(){
    	return view("brand");
    }


    public function addBrand(Request $req){

      try {
      $photo=$req->photo;
      if(isset($photo)){
      $ext = $photo->getClientOriginalExtension();
      $newName = rand(100000,1001238912).".".$ext;
      $gambar_path = public_path()."/gambar/mobil/";
      $photo->move($gambar_path, $newName);     
      }
  
          $brand=Brand::create([
             "brand_name"=>$req->name,
             "price"=>$req->price,
             "category"=>$req->category,
             "photo"=>$newName
        ]);
        return Response::json("Data Has Been Added ", 200);

    } catch (Exception $e) {
        
        return Response::json("Failed To Add Data", 500);
    }
    
      
    }


    public function showBrand(){
      return Datatables::of(Brand::get())
        ->addColumn('action','
            <center>
            <a href="#"  data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-brand"  data-toggle="modal" data-target="#formModal">
            <i class="fa fa-edit"></i>
            
            </a>
           
           <a href="brand/detail/{{$id}}" class="btn btn-primary"> <i class="fa fa-eye"></i></a>
           
           <a href="#" class="btn btn-danger" onclick="deleteBrand({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action','role'])
        ->addIndexColumn()
        ->make(true);
      make(true);
    }


    public function deleteBrand($id){
      $brand = Brand::find($id);
      if($brand->delete()){
       if(isset($brand->photo)){
        $oldPath = $brand->photo;
        if(isset($oldPath)){
        $path = public_path()."/gambar/mobil/".$oldPath;
        if(file_exists($path)){
          unlink($path);
              }
            }
         }
       return Response::json("Data Has Been Deleted ", 200);
      }else {
       return Response::json("Failed To Delete Data ", 500);

      }
    }

    public function editBrand(Request $req){
        $brand=Brand::find($req->id);
        $name=$req->name;
        $price=$req->price;
        $category=$req->category;
        $photo=$req->photo;
        $oldPath=$brand->photo;
        
        $brand->brand_name=$name;
        $brand->price=$price;
        $brand->category=$category; 
        if(isset($photo)){
            $ext = $photo->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $gambar_path = public_path()."/gambar/mobil/";
            $photo->move($gambar_path, $newName);
            $brand->photo=$newName;
            $check=$brand->save();
            if($check && !empty($oldPath)){
              $path = public_path()."/gambar/mobil/".$oldPath;
              if(file_exists($path)){
                 unlink($path);
              }
            }  
          return Response::json("Data Has Been Change ", 200);
        }
          $check=$brand->save();
          return Response::json("Data Has Been Change ", 200);
      



    }

    public function profileBrand($id){
      $brand = Brand::find($id);
      return Response::json($brand, 200);

    }

    public function brandDetail($id){

      $brand = Brand::find($id);
      if(!$brand){
        abort(404);
      }
      return view("brand-detail",["brand"=>$brand]);
    }

    public function addCar(Request $req){
       $car=Car::where("police_number",$req->police_number)->first();

     if($car){
     return Response::json("Data Police Number Already Used", 402);
     }
     try{
        $car = Car::create([
                 "color"=>$req->color,
                 "year"=>$req->year,
                 "brand_id"=>$req->brand_id,
                 "police_number"=>$req->police_number
                ]);
         return Response::json("Data Has Been Added ! ", 200);
     }catch(Exception $e){
        return Response::json("Failed To Add Data !", 500);
     }
    
    }


    public function deleteCar($id){
       $car = Car::find($id);
       $car->delete();
       return Response::json("Data Has Been Deleted ", 200);
    }

   public function profileCar($id){
    $car = Car::find($id);
    return $car;
   }
    public function editCar(Request $req){
     
      $car = Car::find($req->carID);
      $car->police_number = $req->police_number;
      $car->year =  $req->year;
      $car->color = $req->color;
      $car->save();
      return Response::json("Data Has Been Change", 200);

    }

    public function showCar($id){
      return Datatables::of(Car::where("brand_id",$id)->get())
        ->addColumn('action','
            <center>
            <a href="#"  data-id="{{ $id }}" data-original-title="Edit" class="edit btn btn-success edit-car"  data-toggle="modal" data-target="#formModal">
            <i class="fa fa-edit"></i>
            
            </a>
           

           
           <a href="#" class="btn btn-danger" onclick="deleteCar({{$id}})"><i class="fa fa-trash"></i></a>
              </center>')
        ->rawColumns(['action','role'])
        ->addIndexColumn()
        ->make(true);
      
    }

    public function exportCarAvailable(){
      return  Excel::download(new CarAvailableExport, 'car_available_record.xlsx');
    }

    public function exportCarUnavailable(){
      return  Excel::download(new CarUnavailableExport, 'car_unavailable_record.xlsx');
    }
}
