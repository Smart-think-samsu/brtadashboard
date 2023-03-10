@extends('backend.master.layout.app')


@section('content')
        <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
<div class="content-wrapper">
  <div class="content">                
        <!-- Top Statistics -->
    <div class="row">
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$totalreceived}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">Total Licence Received</span> 
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-up-bold text-success"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-1"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$todayreceived}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">Today Licence Received</span>
              <!-- <span class="mx-1"></span> -->
              <i class="mdi mdi-arrow-up-bold text-success"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-2"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$this_week_data}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">This Week Total licence Received</span>
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-up-bold text-success"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-3"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$last_week}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">Last week Total licence Received</span>
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-up-bold text-success"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-4"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$totalbooking}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">Total Licence Booked </span> 
              <span class="mx-1"></span>
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-1"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$todaybooking}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              
              <span class="mr-1"> Today Licence Booked </span> 
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-2"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$this_week_booking}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">This Week Total licence Booked</span>
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-3"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$last_week_booked}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">Last week Total licence Booked</span>
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-4"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$totalbooking}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1">Total Delivered</span>
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-4"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>

      <div class="col-xl-3 col-sm-6">
        <div class="card card-default card-mini">
          <div class="card-header">
            <h2>{{$undelivered}}</h2>
            <!-- <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div> -->
            <div class="sub-title">
              <span class="mr-1"> Undelivered</span>
              <span class="mx-1"></span>
              <i class="mdi mdi-arrow-down-bold text-danger"></i>
            </div>
          </div>
          <!-- <div class="card-body">
            <div class="chart-wrapper">
              <div>
                <div id="spline-area-4"></div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
      
    
    

    <!-- Card Offcanvas -->
    <!-- <div class="card card-offcanvas" id="contact-off" >
      <div class="card-header">
        <h2>Contacts</h2>
        <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
      </div>
      <div class="card-body">

        <div class="mb-4">
          <input type="text" class="form-control form-control-lg form-control-secondary rounded-0" placeholder="Search contacts...">
        </div>

        <div class="media media-sm">
          <div class="media-sm-wrapper">
            <a href="user-profile.html">
              <img src="images/user/user-sm-01.jpg" alt="User Image">
              <span class="active bg-primary"></span>
            </a>
          </div>
          <div class="media-body">
            <a href="user-profile.html">
              <span class="title">Selena Wagner</span>
              <span class="discribe">Designer</span>
            </a>
          </div>
        </div>

        <div class="media media-sm">
          <div class="media-sm-wrapper">
            <a href="user-profile.html">
              <img src="images/user/user-sm-02.jpg" alt="User Image">
              <span class="active bg-primary"></span>
            </a>
          </div>
          <div class="media-body">
            <a href="user-profile.html">
              <span class="title">Walter Reuter</span>
              <span>Developer</span>
            </a>
          </div>
        </div>

        <div class="media media-sm">
          <div class="media-sm-wrapper">
            <a href="user-profile.html">
              <img src="images/user/user-sm-03.jpg" alt="User Image">
            </a>
          </div>
          <div class="media-body">
            <a href="user-profile.html">
              <span class="title">Larissa Gebhardt</span>
              <span>Cyber Punk</span>
            </a>
          </div>
        </div>

        <div class="media media-sm">
          <div class="media-sm-wrapper">
            <a href="user-profile.html">
              <img src="images/user/user-sm-04.jpg" alt="User Image">
            </a>

          </div>
          <div class="media-body">
            <a href="user-profile.html">
              <span class="title">Albrecht Straub</span>
              <span>Photographer</span>
            </a>
          </div>
        </div>

        <div class="media media-sm">
          <div class="media-sm-wrapper">
            <a href="user-profile.html">
              <img src="images/user/user-sm-05.jpg" alt="User Image">
              <span class="active bg-danger"></span>
            </a>
          </div>
          <div class="media-body">
            <a href="user-profile.html">
              <span class="title">Leopold Ebert</span>
              <span>Fashion Designer</span>
            </a>
          </div>
        </div>

        <div class="media media-sm">
          <div class="media-sm-wrapper">
            <a href="user-profile.html">
              <img src="images/user/user-sm-06.jpg" alt="User Image">
              <span class="active bg-primary"></span>
            </a>
          </div>
          <div class="media-body">
            <a href="user-profile.html">
              <span class="title">Selena Wagner</span>
              <span>Photographer</span>
            </a>
          </div>
        </div>

      </div>
    </div> -->


@endsection