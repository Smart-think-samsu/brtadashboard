
@extends('backend.master.layout.app')
@section('content')

<div class="content">
  <div class="container" style="margin-top:10px;">
    @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    @endif


    <table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Start date:</td>
            <td><input type="text" id="min" name="min"></td> <span style="margin-left:5px;"></span>
            <td>End date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
        <!-- <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr> -->
    </tbody></table>
    <br>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>SI</th>
                <th>Total Received</th>
                <th>Supporting Document</th>
                <th>Date</th>
                <th>Time</th>
                <!-- <th>Action</th> -->
            </tr>
        </thead>
        <tbody>
          @foreach($brtas as $k => $brta)
            <tr>
                <td>{{++$k}}</td>
                <td>{{$brta->total_process}}</td>
                <td><img src="{{asset('img/PDF.webp')}}" alt="" height="30px" width="25px"><a href="{{ asset('uploads/posts').'/'.$brta->total_deliver }}" download> Download</a></td>
                <td>{{($brta->created_at)->format('Y-m-d')}}</td>
                <td>{{($brta->created_at)->format('H-m-s')}}</td>
                <!-- <td>jjjj</td> -->
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
    
@endsection
