<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use App\Models\Brtastatus;
use App\Models\Brtabookings;
use App\Models\Epassreceiveds;
use App\Models\Epassport;
use Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Mail; 
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('backend.auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('backend.auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $user = \Auth::user();
        //dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        //dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
            ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect()->back()->withSuccess('Oppes! You have entered invalid credentials');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  $user = \Auth::user();
        //dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $createUser = $this->create($data);
  
        $token = Str::random(64);
  
        UserVerify::create([
              'user_id' => $createUser->id, 
              'token' => $token
            ]);
  
        Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });
         
        return redirect("dashboard")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     * 
     */
    public function dashboard()
    {
        //return "connceion okkkkk ";
        // $user = \Auth::user();
        // dd($user);
        //return "THIS SECTION";
        
        if(Auth::check()){
            // Total received calculation
            $totalreceived = Brtastatus::sum('total_process');        
            $todayreceived = Brtastatus::whereDate('created_at', Carbon::today())->sum('total_process');
            $now = Carbon::now();   
            //dd($now);
            $weekStartDate = $now->copy()->startOfWeek(Carbon::SATURDAY)->format('Y-m-d H-m-s');
            $weekEndDate = $now->copy()->endOfWeek(Carbon::THURSDAY)->format('Y-m-d H-m-s');
            //dd($weekEndDate);
            $this_week_data = Brtastatus::where('created_at', '>', $weekStartDate)->where('created_at', '<', $weekEndDate)->sum('total_process');

            $subweekStartDate = Carbon::now(Carbon::SATURDAY)->subDays(7)->format('Y-m-d H-m-s');            
            $last_week = Brtastatus::where('created_at', '<', $weekStartDate)->where('created_at', '>', $subweekStartDate)->sum('total_process');
            //dd(round($todayreceived));

            $totalbooking = Brtabookings::count();
            $totaldelevared = Brtabookings::where('booking_status','Delivered')->count();
            $todaybooking = Brtabookings::whereDate('created_at', Carbon::today())->count();
            $this_week_booking = Brtabookings::where('created_at', '>', $weekStartDate)->where('created_at', '<', $weekEndDate)->count();
            $last_week_booked = Brtabookings::where('created_at', '<', $weekStartDate)->where('created_at', '>', $subweekStartDate)->count();
            $undelivered = $totalreceived - $totaldelevared;
            //dd($undelivered);
            // $totaldelivered = Brtabookings::count();
            //'etotalreceived','etodayreceived','ethis_week_data','elast_week','etotalbooking','etotaldelevared','etodaybooking','ethis_week_booking','elast_week_booked','eundelivered'

            $etotalreceived = Epassreceiveds::sum('total_receved');
            $etodayreceived = Epassreceiveds::whereDate('created_at', Carbon::today())->sum('total_receved');
            $ethis_week_data = Epassreceiveds::where('created_at', '>', $weekStartDate)->where('created_at', '<', $weekEndDate)->sum('total_receved');
            $elast_week = Epassreceiveds::where('created_at', '<', $weekStartDate)->where('created_at', '>', $subweekStartDate)->sum('total_receved');
            
            $etotalbooking = Epassport::count();
            $etotaldelevared = Epassport::where('booking_status','Delivered')->count();
            $etodaybooking = Epassport::whereDate('created_at', Carbon::today())->count();
            $ethis_week_booking = Epassport::where('created_at', '>', $weekStartDate)->where('created_at', '<', $weekEndDate)->count();
            $elast_week_booked = Epassport::where('created_at', '<', $weekStartDate)->where('created_at', '>', $subweekStartDate)->count();
            $eundelivered = $etotalreceived - $etotaldelevared;
            //dd($eundelivered); 

            return view('backend.dashboard.index',compact('totalreceived','todayreceived','this_week_data','last_week','totalbooking','todaybooking','this_week_booking','last_week_booked','undelivered','totaldelevared','etotalreceived','etodayreceived','ethis_week_data','elast_week','etotalbooking','etotaldelevared','etodaybooking','ethis_week_booking','elast_week_booked','eundelivered'));

        }
  
        return redirect("admin.login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response() 
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('admin.login')->with('message', $message);
    }
}