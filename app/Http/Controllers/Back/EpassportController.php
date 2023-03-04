<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Epassport;
use Carbon\Carbon;
use Illuminate\Support\Str;


class EpassportController extends Controller
{
    public function chackpassport(Request $request)
    {
        $passport = Epassport::where('user_id',$request->user_id)->where('post_code',$request->post_code)->first();
        if(isset($passport)){
            return response()->json([
                "status_code"=>'200',
                "status"=>"Success", 
                "user_id"=>$passport["user_id"],
                "insurance_id"=>$passport["insurance_id"],
                "rpo_address"=>$passport["rpo_address"],
                "phone"=>$passport["phone"],
                "post_code"=>$passport["post_code"],
                "barcode"=>$passport["barcode"],
                "item_id"=>$passport["item_id"],
                "total_charge"=>$passport["total_charge"],
                "service_type"=>$passport["service_type"],
                "vas_type"=>$passport["vas_type"],
                "price"=>$passport["price"],
                "insured"=>$passport["insured"],
                "booking_status"=>$passport["booking_status"],
                "created_at"=>$passport["created_at"],
                "updated_at"=>$passport["updated_at"]    
            ]);
        }else{
            return response()->json([
                'status_code' => '404',
                'message'=> 'Data not found',
                // 'token' => $passport->createToken("API TOKEN")->plainTextToken
    
            ]);
        }
        
    }

    
    public function storepassport(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|min:4',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        // ]);
        // =========insurance id make============
        // $in_date = Carbon::now()->format('Y-m-d 00:00:00');
        // $in_id = Epassport::whereDate('created_at', $in_date)->count();
        // $insurance_m_id = ++$in_id;      
        // $insurance_id = 'IN000'.$insurance_m_id;
        // return $insurance_id;

  
        $epassport = Epassport::create([
            'user_id' => $request->user_id,
            'insurance_id' => $request->insurance_id,
            'rpo_address' => $request->rpo_address,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'barcode' => $request->barcode,
            'booking_status' => $request->booking_status,
           
        ]);
  
        $epassport = Epassport::where('phone', $request->phone)->where('post_code', $request->post_code)->first();
        return response()->json([
                'status_code' => '200',
                'message'=> 'Success',
                'created_at'=> $epassport->created_at
            
        ], 200);
        
    }

    public function pandingpassport(Request $request)
    {

        $pending_date = Carbon::now();
        //return $request->booking_status;
        // $this->validate($request, [
        //     'name' => 'required|min:4',
        //     'email' => 'required|email',
        //     'password' => 'required|min:8',
        // ]);
        // =========insurance id make============
        // $in_date = Carbon::now()->format('Y-m-d 00:00:00');
        // $in_id = Epassport::whereDate('created_at', $in_date)->count();
        // $insurance_m_id = ++$in_id;      
        // $insurance_id = 'IN000'.$insurance_m_id;
        // return $insurance_id;

  
        Epassport::where('user_id',$request->user_id)->where('barcode',$request->barcode)->update([        

            'booking_status' => $request->booking_status,            
            'pending_date' => $pending_date,

        ]);
        //$epassport = Epassport::where('barcode', $request->item_id)->first();
        return response()->json([
            'status_code' => '200',
            'message'=> 'Success',

        ]);
        
    }


    public function submitpassport(Request $request)
    {    
        //return $request;
        
        $booking_date = Carbon::now();

        Epassport::where('user_id',$request->user_id)->where('barcode',$request->item_id)->update([
            'item_id' => $request->item_id,
            'total_charge' => $request->total_charge,
            'service_type' => $request->service_type,
            'vas_type' => $request->vas_type,
            'price' => $request->price,
            'insured' => $request->insured, 
            'booking_status' => $request->booking_status,
            'booking_date' => $booking_date,
        ]);
        $epassport = Epassport::where('barcode', $request->item_id)->first();
        return response()->json([
            'status_code' => '200',
            'message'=> 'Success',
            'created_at'=> $epassport->created_at,
            'updated_at'=> $epassport->updated_at,

        ]);
                
    }

    public function datewisepassport(Request $request)
    { 
        
        $epassportdata = Epassport::whereDate('pending_date', $request->date)->where('user_id', $request->user_id)->get();      
       //return $epassportdata;
        return $response = array(
            "status_code"=>"200",
            "status"=>"Success",          
            "passportissuedata"=>$epassportdata
        );
                        
    }


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










    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $epassports = Epassport::all();
        return view('backend.epassport.index',compact('epassports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ini_set('max_execution_time', 0);

        $bookingdatas = Epassport::where('booking_status','Booked')->get();
        //dd($bookingdatas);
        //$bookingdatas = Brtabookings::whereBetween(DB::raw('(id)'), ['18', '20'])->get();
        //dd($bookingdatas);
        //$mm = ($bookingdatas['0']['user_id']);
        //dd($mm);
        $data = Http::post('https://www.bpodms.gov.bd/app_dommail_internal_api/public/ws/login', [
            'user_id' => '1215005',
            'password' => '007007',
            'user_group' => 'POSTAGE_POS',
            'hnddevice' =>0,
        ]);
       $post = json_decode($data->getBody()->getContents());
       //dd($post);

        foreach($bookingdatas as $bookingdata){
            //dd($bookingdata->barcode);
            $response = Http::withHeaders(['Authorization'=> 'Bearer '.$post->token])->post('https://www.bpodms.gov.bd/app_dommail_internal_api/public/ws/reportsingle', [
                'user_id' => '1215005',
                'user_group' => 'POSTAGE_POS',
                'my_branch_code' => $post->my_emts_branch_code, //'121500',
                'item_id' => 'DL781778137BD', //$bookingdata->my_emts_branch_code $bookingdata->barcode,
                'report_flag' => 'deliver_point_deliver_return_item_search',
                'hnddevice' =>'0'
            ]);
            //dd($response);
            $chackpost = json_decode($response->getBody()->getContents());
            //dd($chackpost);
           if($chackpost->status ==  'Deny: Item ID:'.$bookingdata->item_id.'has already Delivered to Receipient'){
   
            //dd($bookingdata->barcode);
            Brtabookings::where('item_id', $bookingdata->item_id)
                ->update(['booking_status' => 'Delivered']);

            }           
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = Carbon::now()->format('Y-m-d 00:00:00');
        //dd($date);
        $brtabooks = Epassport::where('user_id',$id)->whereDate('created_at', $date)->get();
        //dd($brtabooks);
        return view('backend.epassport.opindex',compact('brtabooks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
