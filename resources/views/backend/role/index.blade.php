
@extends('backend.master.layout.app')
@section('content')

<div class="content">
  <div class="container" style="margin-top:10px;">
    @if(session('success'))
        <div class="alert alert-success">
            <p>{{session('success')}}</p>
        </div>
    @endif
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
            @foreach($roles as $k => $role)         
                <tr>
                    <td>{{++$k}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->slug}}</td>
                    <td>
                        <a href="{{Route('role-permission',$role->id)}}" class="btn btn-sm btn-outline--primary">
                            <i class="las la-desktop"></i> Permissions
                        </a>
                    </td>
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
