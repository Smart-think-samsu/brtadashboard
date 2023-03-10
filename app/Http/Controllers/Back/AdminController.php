<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Role;
use App\Models\Brtabookings;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Paginator::useBootstrap();
        $users = User::orderBy('id','DESC')->paginate(10);
        //dd($users);
        return view('backend.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view ('backend.users.create',compact('roles'));
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
            'name' => ['required'],
            'email' => ['required','unique:users'],
            'password' => ['required'],
        ]);   
        User::create([
            'name' => $request['name'],
            'user_id' => $request['user_id'],
            'user_password' => $request['user_password'],
            'user_group' => $request['user_group'],
            'hnddevice' => $request['hnddevice'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'bar_user_id' => $request['bar_user_id'],
            'bar_user_pass' => $request['bar_user_pass'],
            'barcode_qty' => $request['barcode_qty'],
            'barcode_type' => $request['barcode_type'],
            'password' => Hash::make($request['password']),
            'is_email_verified' =>'1',
            'is_admin' => $request['is_admin'],
            'role_id' => $request['role_id'],
        ]);
        return redirect('adminuser')
        ->with('success','User Create successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        //dd($user);
        return view('backend.users.user_profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = Carbon::now()->format('Y-m-d 00:00:00');
        //dd($date);
        $brtabooks = Brtabookings::where('user_id',$id)->whereDate('created_at', $date)->get();
        //dd($brtabooks);
        return view('backend.brtabooking.opindex',compact('brtabooks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $user=User::find($id);
        $user->delete();
        return redirect('adminuser')
        ->with('success','User delete successfully.');
    }
}
