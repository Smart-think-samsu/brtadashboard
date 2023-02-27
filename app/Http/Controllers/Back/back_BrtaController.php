<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brtastatus;
use App\Models\Image;
use Carbon\Carbon;
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
        
        $date = Carbon::now()->format('Y-m-d 00:00:00');
        
        $chack_date = Brtastatus::whereDate('created_at', $date)->count();
        //dd($chack_date);
        if($chack_date == 0){

            $user = \Auth::user();
            $brta = new Brtastatus();
            $brta->user_id = $user->id;
            $brta->total_process = $request->total_process;
            $brta->total_deliver = '1';
            $brta->save();

            if($request->hasFile('total_deliver'))
            {
                foreach($request->file('total_deliver') as $image)
                {
                    $imagein = new Image;
                    $destinationPath = 'uploads/posts/';
                    $filename = $image->getClientOriginalName();
                    $image->move($destinationPath, $filename);
                    $imagein->image = $filename;
                    $imagein->brta_status_id = $brta->id;
                    $imagein->save();
                    
                }
                
            }

            return redirect()->route('brta_status.index')->with('success', 'Brta status SuccessFully Created');
        }
        else{
            return redirect()->back()->with('success', 'Today you are Already submited');
        }


        // foreach ($request->file('total_deliver') as $imagefile) {            
        //     $image = new Image;
        //     $path = $imagefile->store('/images/resource');
        //     $image->image = $path;
        //     $image->brta_status_id = $brta->id;
        //     $image->save();
        //   }





        // foreach ($request->file('total_deliver') as $imagefile) { 

        //     $file = array();
        //     $fileName = $file->getClientOriginalName() ;
        //     $destinationPath = public_path().'/images' ;
        //     $file->move($destinationPath,$fileName);
        //     $UserImage->userImage = $fileName ;
        //     $UserImage = UserImage::create(['file' => $request->file('input_img')]);
                       
        //         $image = new Image;
        //         $filee = $request->total_deliver;
        //         $fileName = $imagePost;
        //         $filee->move('uploads/posts',$fileName);
        //         $image->image = $fileName;
        //         $image->brta_status_id = '1';
        //         $image->save();
        //       }


        // foreach ($request->file('total_deliver') as $imagefile) {           
        //     $image = new Image;
        //     $imagePost = 'IMAGE-POST'.time().$request->file('total_deliver')->getClientOriginalName();
        //     $fileName = $imagePost;
        //     $filee = $request->total_deliver;
        //     $fileName = $imagePost;
        //     $filee->move('uploads/posts',$fileName);
        //     $image->brta_status_id = '1';
        //     $image->image = $fileName;
        //     $image->save();
        // }

            //return "success";

            //     $imagePost = 'IMAGE-POST'.time().$request->file('total_deliver')->getClientOriginalName();
            //     dd($imagePost);
            //     $filee = $request->total_deliver;
            //     // dd($filee);
            //     $fileName = $imagePost;
            //     $filee->move('uploads/posts',$fileName);
            //     $brta->total_deliver = $fileName;

                // if($request->hasFile('total_deliver'))
                // {
                //     $allowedfileExtension=['pdf','jpg','png','docx'];
                //     $files = $request->file('photos');
                                     
                // }

                // if($request->hasFile('total_deliver'))
                // {
                //     foreach($request->file('total_deliver') as $image)
                //     {
                //         // dd($request->$image);
                //         $destinationPath = 'content_images/';
                //         $filename = $image->getClientOriginalName();
                //         dd($filename);
                //         $image->move($destinationPath, $filename);
                //         $content->image = $filename;

                //     }

                // }
 
                // $content->save();    
            // if($request->hasFile('total_deliver'))
            // {
            //     $imagePost = 'IMAGE-POST'.time().$request->file('total_deliver')->getClientOriginalName();
            //     dd($imagePost);
            //     $filee = $request->total_deliver;
            //     // dd($filee);
            //     $fileName = $imagePost;
            //     $filee->move('uploads/posts',$fileName);
            //     $brta->total_deliver = $fileName;
            //     $brta->save();
            // }

        //$brta->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images = Image::where('brta_status_id', $id)->get();
        //dd($images);
        return response()->json($images);
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
