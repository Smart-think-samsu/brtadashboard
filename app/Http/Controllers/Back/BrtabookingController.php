<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brtabookings;
use App\Models\Brtastatus;
use Carbon\Carbon;
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
        //return $request;

        $brtabookings = Brtabookings::where('drivingLicenseNo', $request->drivingLicenseNo)->where('user_id', $request->user_id)->first();      
        //return $brtabookings;
        if($brtabookings){
        return $response = array(
                        "status_code"=>"200",
                        "status"=>"Success", 
                        "user_id"=>$brtabookings["user_id"],
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
                        "updated_at"=>$brtabookings["updated_at"]                                   
                                    
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
            $brtabookings->booking_status = 'Pending';
    
            // $brtabookings->deliveryAddress =json_encode($request->deliveryAddress);
    
            $brtabookings->save();
            return $response = array(
                "status_code"=>"200",
                "status"=>"Success"
            
            );
        }else{
            return $response = array(
                "status_code"=>"500",
                "status"=>"Item already exist"
            
            );
        }

        

        
    }


    public function brtabookinglicencestore(Request $request)
    {    
        $sample = Brtabookings::where('barcode', $request->item_id)->update($request->all()); 
        return $response = array(
            "status_code"=>"200",
            "status"=>"Success"        
        );
                
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
        
        $brtadailydatas = Brtabookings::whereDate('created_at', $request->date)->get();      

        
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
        //
    }
}
