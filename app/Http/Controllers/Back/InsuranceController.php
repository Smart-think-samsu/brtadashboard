<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brtabookings;
use DB;
class InsuranceController extends Controller
{
    public function index(){

        $bookinginfos = Brtabookings::orderBy('id','DESC')->get();
        //dd($bookinginfo);
        return view('backend.insurance.index',compact('bookinginfos'));

    }

    public function report(){
        $reports = DB::table('brtabookings')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'), DB::raw('MIN(insurance_id) as min_id'), DB::raw('MAX(insurance_id) as max_id'))
      ->groupBy('date')
      ->get();
      //dd($reports);
      return view('backend.insurance.report',compact('reports'));
      
    }

    public function datereport($date)
    {
      //dd($date);
      $datas = Brtabookings::whereDate('created_at', $date)->get();
      $date = Brtabookings::whereDate('created_at', $date)->first();
      //dd($datas);
      return view('backend.insurance.print',compact('datas','date'));
      
    }

}
