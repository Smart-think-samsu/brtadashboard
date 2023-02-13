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


        //$user = \Auth::user();
        //dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        // $user = User::where('email','=',$request->email)->first();

        // return $user;

   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           $user = \Auth::user();

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
