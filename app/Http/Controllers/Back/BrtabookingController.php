<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brtabookings;
use App\Models\Brtastatus;
use Carbon\Carbon;
use Illuminate\Support\Str;

class BrtabookingController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookinginfos = Brtabookings::all();
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
    public function create(Request $request)
    {
        
       // return $request;
        // $bookingcount = Brtabookings::where('created_at', $request->date)->get();
        // return $bookingcount;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function licencestore(Request $request)
    {

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
        
        
        $date = Carbon::now()->format('d');
        $insurance_id = $date.rand(1000, 9999); 
        $brtabookchack = Brtabookings::where('drivingLicenseNo', $request->drivingLicenseNo)->first();
        $insurance_id_check = Brtabookings::where('insurance_id', $insurance_id)->first();
        
        if(!$insurance_id_check){
            if(!$brtabookchack){   

                $brtabookings = new Brtabookings();
                $brtabookings->user_id = $request->input('user_id');    
                $brtabookings->insurance_id = $insurance_id;                
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
                $brtabookings->booking_status = 'Pending';        
                // $brtabookings->deliveryAddress =json_encode($request->deliveryAddress);        
                $brtabookings->save();
                $created_at = Brtabookings::where('insurance_id', $insurance_id)->first();
                
                return $response = array(

                    "status_code"=>"200",
                    "status"=>"Success",
                    "insurance_id"=>$insurance_id,               
                    "created_at"=>$created_at->created_at            
                                  
                );

                // return response()->json([
                //     'status' => true,
                //     'message'=> 'success',
                //     'token' => $created_at->createToken("API TOKEN")->plainTextToken
        
                // ]);

            }else{
                return $response = array(
                    "status_code"=>"500",
                    "status"=>"Item already exist"                
                );
            }            
        }else{
            return 'Please try again Something went wrong! ';
        }     

        

        
    }


    public function brtabookinglicencestore(Request $request)
    {    
        

        Brtabookings::where('barcode', $request->item_id)->where('user_id',$request->user_id)->update([
            'item_id'=>$request->item_id,
            'total_charge'=>$request->total_charge,
            'service_type'=>$request->service_type,
            'vas_type'=>$request->vas_type,
            'price'=>$request->price,
            'insured'=>$request->insured,
            'booking_status'=>$request->booking_status,        
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
         
        $brtadailydatas = Brtabookings::whereDate('created_at', $request->date)->where('user_id', $request->user_id)->get();      
       
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
        //
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
