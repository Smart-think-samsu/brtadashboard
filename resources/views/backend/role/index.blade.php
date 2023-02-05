
@extends('backend.master.layout.app')
@section('content')

<div class="content">
  <div class="container" style="margin-top:10px;">
    @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    @endif


    <!-- <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
        <tr>
            <td>Start date:</td>
            <td><input type="text" id="min" name="min"></td> <span style="margin-left:5px;"></span>
            <td>End date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
        </tbody>
    </table> -->
    <a class="btn btn-primary" href="{{Route('role_add.create')}}" type="submit">New Role</a>
    <br>
    <br>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SI</th>
                <th>Role</th>
                <th>Permissions</th>
                <th>Action</th>
                <!-- <th>Time</th> -->
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>          
            <tr>
                <td>01</td>
                <td>milon</td>
                <td>milon</td>
                <td>action</td>
                <!-- <td>jjjj</td> -->
            </tr>      
        </tbody>
        <!-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot> -->
    </table>


    



  </div>
</div>
    
@endsection
