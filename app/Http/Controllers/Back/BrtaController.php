<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brtastatus;
use Auth;


class BrtaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function backindex()
    {
        $user = \Auth::user();
        //dd($user->id);
        $brtas = Brtastatus::all();
        //dd($brtas);
        return view('backend.brta_status.backindex',compact('brtas'));
    }





    public function index()
    {
        $user = \Auth::user();
        //dd($user->id);
        $brtas = Brtastatus::where('user_id', $user->id)->get();
        //dd($brtas);
        return view('backend.brta_status.index',compact('brtas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brta_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'total_process' => ['required'],
            'total_deliver' => ['required'],
        ]);     
        $user = \Auth::user();
        $brta = new Brtastatus();
        $brta->user_id = $user->id;
        $brta->total_process = $request->total_process;
        // $brta->total_deliver = $request->total_deliver;

            // dd($request->all());        
    
            if($request->hasFile('total_deliver'))
            {
                $imagePost = 'IMAGE-POST'.time().$request->file('total_deliver')->getClientOriginalName();
                //dd($imagePost);
                $filee = $request->total_deliver;
                // dd($filee);
                $fileName = $imagePost;
                $filee->move('uploads/posts',$fileName);
                $brta->total_deliver = $fileName;
                $brta->save();
            }
        $brta->save();
        return redirect()->route('brta_status.index')->with('success', 'Brta status SuccessFully Created');

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
        
        //dd($id);
        $user=Brtastatus::find($id);
        $user->delete();
        return redirect('brta_status')
        ->with('success','Brta status delete successfully.');
    }


}
