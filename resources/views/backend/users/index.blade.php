@extends('backend.master.layout.app')


@section('content')
<div class="content">
    <div class="container">
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
                        <a href="#">
                        <i class="mdi mdi-open-in-new"></i>
                        </a>
                        <a href="#">
                        <i class="mdi mdi-close text-danger"></i>
                        </a>

                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $users->appends(['sort' => 'votes'])->links() !!}
    </div>
</div>

@endsection

          