
@extends('backend.master.layout.app')
@section('content')

<div class="content">
  <div class="container">
  <div class="card">
            <div class="card-header">
    @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    @endif


    <!-- <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Start date:</td>
            <td><input type="text" id="min" name="min"></td> <span style="margin-left:5px;"></span>
            <td>End date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
    <br> -->
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SI</th>
                <th>id</th>
                <th>Post_Code</th>
                <th>Barcode</th>
                <th>Phone</th>
                <th>barcode</th>
                <th>booking status</th>
                
            </tr>
        </thead>
        <tbody>
          @foreach($epassports as $k => $epassport)
            <tr>
                <td>{{++$k}}</td>
                <td>{{$epassport->id}}</td>
                <td>{{$epassport->post_code}}</td>
                <td>{{$epassport->barcode}}</td>
                <td>{{$epassport->phone}}</td>            
                <td>{{$epassport->barcode}}</td>             
                <td>{{$epassport->booking_status}}</td>             
            </tr> 
          @endforeach           
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
</div>
</div>
@endsection