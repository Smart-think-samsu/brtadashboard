@extends('backend.master.layout.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="card" style="width:580px;margin: 0 auto;">
            <div class="card-header">
                <h2>User Create form</h2>
            </div>
            <div class="card-body">
                <form action="{{Route('adminuser.store')}}" method="post">
                    @csrf
                    <div class="row">
                    <div class="form-group col-md-12 mb-4">
                        <input type="text" class="form-control input-lg" name="name" id="name" aria-describedby="nameHelp" placeholder="Username">
                    </div>
                    <div class="form-group col-md-12 mb-4">
                        <input type="email" class="form-control input-lg" name="email" id="email" aria-describedby="emailHelp" placeholder="email address">
                    </div>
                    <div class="form-group col-md-12 ">
                        <input type="password" class="form-control input-lg" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="form-group col-md-12 ">
                        <input type="password" class="form-control input-lg" name="cpassword" id="cpassword" placeholder="Confirm Password">
                    </div>
                    <div class="form-group col-md-12 ">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="optradio" value="1">
                            <label class="form-check-label" for="radio1">Admin</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="optradio" value="0">
                            <label class="form-check-label" for="radio2">User</label>
                        </div>
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