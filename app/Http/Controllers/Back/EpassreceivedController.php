<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Epassreceiveds;
use Carbon\Carbon;


class EpassreceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $passbookinginfos = Epassreceiveds::orderBy('id','DESC')->get();
        //dd($bookinginfos);      
        return view('backend.epassreceived.index',compact('passbookinginfos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.epassreceived.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'total_receved' => ['required'],
            'edocument' => ['required'],
        ]);  


        $date = Carbon::now()->format('Y-m-d 00:00:00');
        
        $chack_date = Epassreceiveds::whereDate('created_at', $date)->count();
        //dd($chack_date);
        // if($chack_date == 0){

            $user = \Auth::user();
            $brta = new Epassreceiveds();
            $brta->user_id = $user->id;
            $brta->total_receved = $request->total_receved;
            // $brta->total_deliver = $request->total_deliver;

                // dd($request->all());        
        
                if($request->hasFile('edocument'))
                {
                    $imagePost = 'IMAGE-POST'.time().$request->file('edocument')->getClientOriginalName();
                    //dd($imagePost);
                    $filee = $request->edocument;
                    // dd($filee);
                    $fileName = $imagePost;
                    $filee->move('uploads/epassport',$fileName);
                    $brta->edocument = $fileName;
                    $brta->save();
                }
            $brta->save();
            return redirect()->route('epass_received.index')->with('success', 'e-passport SuccessFuly Received');

        // }
        // else{
        //     return redirect()->back()->with('success', 'Today you are Already submited');
        // }
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
