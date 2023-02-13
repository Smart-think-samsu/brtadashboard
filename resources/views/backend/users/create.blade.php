@extends('backend.master.layout.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="card" style="width:800px;margin: 0 auto;">
            <div class="card-header">
                <h2>User Create form</h2>
            </div>
            <div class="card-body">
                <form action="{{Route('adminuser.store')}}" method="post">
                    @csrf
                    <div class="row">
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="name" id="name" aria-describedby="nameHelp" placeholder="Username">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="user_id" aria-describedby="nameHelp" placeholder="User id">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="user_password" aria-describedby="nameHelp" placeholder="User password">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="user_group" aria-describedby="nameHelp" placeholder="User group">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="hnddevice" aria-describedby="nameHelp" placeholder="hnddevice id">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="email" class="form-control input-lg" name="email" aria-describedby="emailHelp" placeholder="email address">
                    </div>



                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="bar_user_id" aria-describedby="nameHelp" placeholder="Barcode User Id">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="bar_user_pass" aria-describedby="nameHelp" placeholder="Barcode User Password">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="barcode_qty" aria-describedby="nameHelp" placeholder="Barcode Quentity">
                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="barcode_type" aria-describedby="nameHelp" placeholder="Barcode Type">
                    </div>


                    <div class="form-group col-md-6 ">
                        <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-6 ">
                        <input type="password" class="form-control input-lg" name="cpassword" id="cpassword" placeholder="Confirm Password">
                    </div>

                    <div class="form-group col-md-6 ">
                        <label for="sel1" class="form-label">Select Role (select one):</label>
                        <select class="form-control" id="sel1" name="sellist1">
                            <option readonly>----- Select Role ----</option>
                            @foreach($roles as $role)
                            <option name="role_id" value = "{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>

                        <!-- <div class="form-check">
                            <input type="radio" class="form-check-input" name="optradio" value="1">
                            <label class="form-check-label" for="radio1">Admin</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="optradio" value="0">
                            <label class="form-check-label" for="radio2">User</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="optradio" value="3">
                            <label class="form-check-label" for="radio2">Operator</label> 
                        </div> -->

                    </div>
                    <div class="form-group col-md-6 mb-4">
                        <input type="text" class="form-control input-lg" name="phone" aria-describedby="emailHelp" placeholder="Phone Number">
                    </div>                         
                    <div class="col-md-12">                     
                        <button type="submit" class="btn btn-primary btn-pill mb-4">Sign Up</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- DELETE MODAL --}}


  
@endsection