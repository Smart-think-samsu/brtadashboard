@extends('backend.master.layout.app')
@section('content')
<div class="content-wrapper">
    <div class="content"><!-- Card Profile -->
        <div class="card card-default card-profile">
            <div class="card-header-bg" style="background-image:url(assets/img/user/user-bg-01.jpg)"></div>

            <div class="card-body card-profile-body">

            <div class="profile-avata">
            <img class="rounded-circle" src="{{asset('backend/images/user/user-md-01.jpg')}}" alt="Avata Image">
            <span class="h5 d-block mt-3 mb-2">{{$user->name}}</span>
            <!-- <span class="d-block">Albrecht.straub@gmail.com</span> -->
            </div>

            <!-- <ul class="nav nav-profile-follow">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span class="h5 d-block">1503</span>
                    <span class="text-color d-block">Friends</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span class="h5 d-block">2905</span>
                    <span class="text-color d-block">Followers</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                    <span class="h5 d-block">1200</span>
                    <span class="text-color d-block">Following</span>
                    </a>
                </li>

            </ul> -->

            <div class="profile-button">
            <a class="btn btn-primary btn-pill" href="#">Update Profile</a>
            </div>

        </div>

        <!-- <div class="card-footer card-profile-footer">
            <ul class="nav nav-border-top justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="user-profile.html">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-activities.html">Activities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user-profile-settings.html">Settings</a>
            </li>
            </ul>
        </div> -->
    </div>
</div>

@endsection