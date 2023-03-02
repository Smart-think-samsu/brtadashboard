<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Illuminate\Support\Str;
use Mail; 

class BookingController extends Controller
{
    public function operatorlogin(Request $request)
    {
        //return $request;      

        $request->validate([
            'email' => 'required',
            'password' => 'required',
            // 'role_id' => 'required',
        ]);
 
        $credentials = $request->only('email', 'password');       
        if (Auth::attempt($credentials)) {
           $user = \Auth::user();
           //return $user->is_admin;
           if($request->role_id == $user->is_admin){
                return response()->json([
                    "status_code"=>"200",
                    "status"=>"Success", 
                    "name"=>$user["name"],
                    "user_id"=>$user["user_id"],
                    "user_password"=>$user["user_password"],
                    "user_group"=>$user["user_group"],
                    "hnddevice"=>$user["hnddevice"],
                    "email"=>$user["email"],
                    "bar_user_id"=>$user["bar_user_id"],
                    "bar_user_pass"=>$user["bar_user_pass"],
                    "barcode_qty"=>$user["barcode_qty"],
                    "barcode_type"=>$user["barcode_type"],
                    "created_at"=>$user["created_at"],
                    "updated_at"=>$user["updated_at"]           
                ]);
           }return response()->json([
            "status_code"=>"404",
            "status"=>"You are not a valid operator",                    
            ]); 
                      

                //return \Auth::user();                
                // return redirect()->intended('dashboard')->withSuccess('You have Successfully loggedin');
        }
        return response()->json([
            "status_code"=>"404",
            "status"=>"User Not Found",                    
        ]); 
        // return redirect()->back()->withSuccess('Oppes! You have entered invalid credentials');
    }
}
