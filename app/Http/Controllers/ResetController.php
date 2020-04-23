<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Redirect;
  


class ResetController extends Controller
{
    

    public function resetPage(){
        return view("changepassword");
    }

    public function changePasswordSubmit(Request $request){

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
          return  Redirect::back()->with(['success' => 'Success']);


      
    }
    
}
