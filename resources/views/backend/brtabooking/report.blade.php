@extends('backend.master.layout.app')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header align-items-center">
            <h2 class="">BRTA Booking Report List</h2>
            
            <!-- <a href="{{Route('adminuser.create')}}" class="btn btn-primary btn-pill" type="submit">Add User</a> -->
        </div>
    
        @if($message = Session::get("success"))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Date</th>
                    <th scope="col">Total Iteam</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $key => $report)
                    <tr>                        
                        <td scope="row">{{ ++$key }}</td>                        
                        <td>{{$report->date}}</td>
                        <td>{{$report->views}}</td>
                        <td class="text-center">
                            <a href="{{Route('brtabooking.datereport',$report->date)}}" class="btn-primary" target="_blank">
                                <i class="fa fa-print" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>

@endsection

          