<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['middleware' => 'revalidate'], function()
{
  
Route::get('/',"HomeController@index")->name("front");

Auth::Routes();
Route::group(['middleware' => ['auth']], function () {
Route::get("/changePassword","ResetController@resetPage")->name("reset");
Route::post("/changePasswordSubmit","ResetController@changePasswordSubmit")->name("change.password");		
Route::get("/dashboard","DashboardController@index")->name("dashboard");
Route::get("/brand","CarsController@index")->name("brand");
Route::post("/brand/addBrand","CarsController@addBrand")->name("add.brand");
Route::get("/brand/showBrand","CarsController@showBrand")->name("show.brand");
Route::delete("/brand/delete/{id}","CarsController@deleteBrand"); 
Route::get("/brand/profile/{id}","CarsController@profileBrand");
Route::get("/brand/detail/{id}","CarsController@brandDetail");  

Route::post("/brand/edit","CarsController@editBrand")->name("edit.brand");
Route::get("/brand/showCar/{id}","CarsController@showCar")->name("show.car");
Route::get("/car/profile/{id}","CarsController@profileCar");
Route::delete("/car/delete/{id}","CarsController@deleteCar"); 
Route::post("/car/addCar","CarsController@addCar")->name("add.car");
Route::post("/car/editCar","CarsController@editCar")->name("edit.car");

Route::get("/customer","CustomerController@index")->name("customer");
Route::get("/customer/show","CustomerController@showCustomer")->name("show.customer");
Route::delete("/customer/delete/{id}","CustomerController@deleteCustomer");
Route::post("/customer/addCustomer","CustomerController@addCustomer")->name("add.customer");
Route::get("/customer/profile/{id}","CustomerController@profileCustomer");
Route::post("/customer/editCustomer","CustomerController@editCustomer")->name("edit.customer");

Route::get("/booking","BookingController@index")->name("booking");
Route::post("/booking/addBook","BookingController@addTrans")->name("add.book");
Route::get("/booking/show","BookingController@showTrans")->name("show.trans");
Route::get("/booking/profile/{id}","BookingController@transProfile");
Route::delete("/booking/Delete/{id}","BookingController@deleteBook");
Route::post("/booking/MarkDone/{id}","BookingController@markDone");


});

});

Route::group(['middleware' => ['auth']], function () {
	Route::get("/booking/exportIncome","BookingController@exportIncome")->name("export.income");
	Route::get("/car/exportCarAvailable","CarsController@exportCarAvailable")->name("exportcaravailable");
Route::get("/car/exportCarUnavailable","CarsController@exportCarUnavailable")->name("exportcarunavailable");
Route::get("/customer/exportCustomer","CustomerController@customerToExcel")->name("customerexport");

});