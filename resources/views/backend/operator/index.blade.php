@extends('backend.master.layout.app')
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

@section('content')
<div class="content">
    <div class="card card-default">
        <div class="card-header align-items-center">
            <h2 class="">Operator List</h2>
            
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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Roles</th>
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        
                        <td scope="row">{{ ++$key }}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <th class="text-center">
                            <!-- <a href="#">
                                <i class="mdi mdi-open-in-new"></i>
                            </a> -->

                            <form onsubmit="return confirm('Are you sure?')" action="/adminuser/delete/{{$user->id}}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('delete')          
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->appends(['sort' => 'votes'])->links() !!}
    </div>
</div>

@endsection

          