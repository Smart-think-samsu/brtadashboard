<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brtabookings;
use DB;

class ReportController extends Controller
{
    
    public function brtabookingreport()
    {
       $reports = DB::table('brtabookings')
      ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
      ->groupBy('date')
      ->get();
      return view('backend.brtabooking.report',compact('reports'));
      //dd($reports);
    }

    public function brtabookindategreport($date)
    {
      $datas = Brtabookings::whereDate('created_at', $date)->get();
      $date = Brtabookings::whereDate('created_at', $date)->first();
      return view('backend.brtabooking.print',compact('datas','date'));
      //dd($datas);
    }
}
