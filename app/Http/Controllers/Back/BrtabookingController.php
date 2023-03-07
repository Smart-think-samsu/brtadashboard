<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brtabookings;
use App\Models\Brtastatus;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class BrtabookingController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookinginfos = Brtabookings::orderBy('id','DESC')->get();
        //dd($bookinginfos);      
        return view('backend.brtabooking.index',compact('bookinginfos'));
    }

    public function bookingcount()
    {
        $bookingcount = Brtabookings::count();
        $sum = Brtastatus::sum('total_process');
        $stocklicence = $sum - $bookingcount;
        
        if($stocklicence > 0){
            return $response = array(
                "status_code"=>"200",
                "data"=>"$stocklicence"
            
            );
            
        }else{
            return $response = array(
                "status_code"=>"200",
                "data"=>"$stocklicence"
            
            );
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        ini_set('max_execution_time', 0);

        $bookingdatas = Brtabookings::where('booking_status','Booked')->get();
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

           if($chackpost->status ==  'Deny: Item ID:'.$bookingdata->item_id.' has already Delivered to Receipient'){
   
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
    public function licencestore(Request $request)
    {
        //return $request;

        $brtabookings = Brtabookings::where('drivingLicenseNo', $request->drivingLicenseNo)->first();      
        //return $brtabookings;
        if($brtabookings){
        return $response = array(
                "status_code"=>"200",
                "status"=>"Success", 
                "user_id"=>$brtabookings["user_id"],
                "insurance_id"=>$brtabookings["insurance_id"],
                "drivingLicenseNo"=>$brtabookings["drivingLicenseNo"],
                "brtaReferenceNo"=>$brtabookings["brtaReferenceNo"],
                "name"=>$brtabookings["name"],
                "fatherName"=>$brtabookings["fatherName"],
                "mobileNo"=>$brtabookings["mobileNo"],
                "houseOrVillage"=>$brtabookings["houseOrVillage"],
                "road"=>$brtabookings["road"],
                "postCode"=>$brtabookings["postCode"],
                "thana"=>$brtabookings["thana"],
                "district"=>$brtabookings["district"],
                "division"=>$brtabookings["division"],
                "barcode"=>$brtabookings["barcode"],
                "item_id"=>$brtabookings["item_id"],
                "total_charge"=>$brtabookings["total_charge"],
                "service_type"=>$brtabookings["service_type"],
                "vas_type"=>$brtabookings["vas_type"],
                "price"=>$brtabookings["price"],
                "insured"=>$brtabookings["insured"],
                "booking_status"=>$brtabookings["booking_status"],
                "created_at"=>$brtabookings["created_at"],
                "pending_date"=>$brtabookings["pending_date"],
                "booking_date"=>$brtabookings["booking_date"],
                "updated_at"=>$brtabookings["updated_at"],                                
                'token' => $brtabookings->createToken("API TOKEN")->plainTextToken       
            );
        }else{
            return $response = array(
                "status_code"=>"404",
                "status"=>"Data not found"
                  
            );
        }
      
    } 



    public function store(Request $request)
    {  
        //return $request;
        //$header = $request->header('Authorization');
        
        
        // $date = Carbon::now()->format('d');

        // // =========insurance id make============
        // $in_date = Carbon::now()->format('Y-m-d 00:00:00');
        // $in_id = Brtabookings::whereDate('created_at', $in_date)->count();
        // $insurance_m_id = ++$in_id;      
        // $insurance_id = 'IN000'.$insurance_m_id;

        //return $insurance_id;



        // $insurance_id_check = Brtabookings::where('insurance_id', $insurance_id)->first();        
        // $insurance_id = $date.rand(1000, 9999);
        // $insurance_id_check = Brtabookings::where('insurance_id', $insurance_id)->first();


            $brtabookchack = Brtabookings::where('drivingLicenseNo', $request->drivingLicenseNo)->first();      
        
            if(!$brtabookchack){   

                $brtabookings = new Brtabookings();
                $brtabookings->user_id = $request->input('user_id');            
                $brtabookings->drivingLicenseNo = $request->input('drivingLicenseNo');
                $brtabookings->brtaReferenceNo = $request->input('brtaReferenceNo');
                $brtabookings->name = $request->input('name');
                $brtabookings->fatherName = $request->input('fatherName');
                $brtabookings->mobileNo = $request->input('mobileNo');
                $brtabookings->houseOrVillage = $request->input('houseOrVillage');
                $brtabookings->road = $request->input('road');
                $brtabookings->postCode = $request->input('postCode');
                $brtabookings->thana = $request->input('thana');
                $brtabookings->district = $request->input('district');
                $brtabookings->division = $request->input('division');
                $brtabookings->barcode = $request->input('barcode');
                $brtabookings->booking_status = $request->input('booking_status');       
                $brtabookings->save();
                $pending_date = Brtabookings::where('drivingLicenseNo', $request->drivingLicenseNo)->first();
                
                return $response = array(

                    "status_code"=>"200",
                    "status"=>"Success",
                    "insurance_id"=>$pending_date->insurance_id!=0?$pending_date->insurance_id:' ',               
                    "pending_date"=>$pending_date->pending_date!=0?$pending_date->pending_date:' ',           
                                  
                );
            }else{
                return $response = array(
                    "status_code"=>"500",
                    "status"=>"Item already exist"                
                );
            }
        
    }

    public function storepending(Request $request)
    {    
        //return $request;

        $date = Carbon::now()->format('d');

        // =========insurance id make============
        $in_date = Carbon::now()->format('Y-m-d 00:00:00');
        $in_id = Brtabookings::whereDate('pending_date', $in_date)->count();
        $insurance_m_id = ++$in_id;      
        $insurance_id = 'IN000'.$insurance_m_id;
        
        $pending_date = Carbon::now();
        $checkin = Brtabookings::where('barcode', $request->barcode)->where('user_id',$request->user_id)->first();
        //return $checkin->insurance_id;
        if($checkin->insurance_id == 0){
            //return "new in id update";
            Brtabookings::where('barcode', $request->barcode)->where('user_id',$request->user_id)->update([            
                'insurance_id'=>$insurance_id,
                'booking_status'=>$request->booking_status,
                'pending_date' => $pending_date,       
            ]);
        }else{
            Brtabookings::where('barcode', $request->barcode)->where('user_id',$request->user_id)->update([
                'booking_status'=>$request->booking_status,
                'pending_date' => $pending_date,      
            ]);
        };
        //return "data alteady input";
        

        $pending_date = Brtabookings::where('barcode', $request->barcode)->first();
        //return $pending_date;
        return response()->json([
            'status_code' => '200',
            'message'=> 'Success',
            "insurance_id"=>$pending_date->insurance_id!=0?$pending_date->insurance_id:' ',
            "pending_date"=>$pending_date->pending_date!=0?$pending_date->pending_date:' ',  

        ]);

        // return $response = array(
        //     "status_code"=>"200",
        //     "status"=>"Success"        
        // );
                
    }



    public function brtabookinglicencestore(Request $request)
    {    
        
        $booking_date = Carbon::now();
        Brtabookings::where('barcode', $request->item_id)->where('user_id',$request->user_id)->update([
            'item_id'=>$request->item_id,
            'total_charge'=>$request->total_charge,
            'service_type'=>$request->service_type,
            'vas_type'=>$request->vas_type,
            'price'=>$request->price,
            'insured'=>$request->insured,
            'booking_status'=>$request->booking_status,
            'booking_date' => $booking_date,        
        ]);

        $bookingcount = Brtabookings::count();
        $sum = Brtastatus::sum('total_process');
        $stocklicence = $sum - $bookingcount;
        
        if($stocklicence > 0){
            return $response = array(
                "status_code"=>"200",
                "data"=>"$stocklicence"
            
            );
            
        }else{
            return $response = array(
                "status_code"=>"200",
                "data"=>"$stocklicence"
            
            );
        }

        // return $response = array(
        //     "status_code"=>"200",
        //     "status"=>"Success"        
        // );
                
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $bookinglicence = Brtabookings::all();
        return response()->json($bookinglicence);
    }
        // ===============BRTA DATE WISE BOOKIN LIST =====================

    public function bookingdailydata(Request $request)
    { 
        //return $request; 

        if($request->date >= '2023-03-06 00:00:00' ){
            //return "milon";
            $brtadailydatas = Brtabookings::whereDate('pending_date', $request->date)->orwhereDate('booking_date', $request->date)->where('user_id', $request->user_id)->get();
        
        }else{

            $brtadailydatas = Brtabookings::whereDate('created_at', $request->date)->where('user_id', $request->user_id)->get();      
       
        };
         
        return $response = array(
            "status_code"=>"200",
            "status"=>"Success",          
            "licenseIssueData"=>$brtadailydatas
        );
                        
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "conncetion okkggg";
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
        Brtabookings::destroy($id);
        return "Delete Successfully";
    }
}
