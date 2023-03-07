@extends('backend.master.layout.app')
@section('content')
<!-- ====================================
——— CONTENT WRAPPER
===================================== -->
<div class="content-wrapper">
  <div class="content">                
    <!-- Top Statistics -->
      <div class="row">
        <div class="col" style="background-color:white;padding:10px;border-radius:5px;">      
        <h4>BRTA Licence status</h4>  
        </div>
      </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-4 card">
            <div class="card-header" style="padding-left:22px;">
                <h5>Received</h5> 
            </div>
            <table class="table">
                <tbody>
                    <tr>                    
                      <td style ="padding-left:20px;"><h6> Total</h6> </td>
                      <td style ="text-align:center;"><h6>{{$totalreceived}}</h6></td>
                    </tr>

                    <tr>                    
                      <td style ="padding-left:20px;"><h6>Today</h6> </td>
                      <td style ="text-align:center;"><h6>{{$todayreceived}}</h6></td>
                    </tr>

                    <tr>                    
                      <td style ="padding-left:20px;"><h6>This Week</h6></td>
                      <td style ="text-align:center;"><h6>{{$this_week_data}}</h6></td>
                    </tr>
                    <tr>                    
                      <td style ="padding-left:20px;"><h6>Last Week</h6></td>
                      <td style ="text-align:center;"><h6>{{$last_week}}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-4 card">
            <div class="card-header" style="padding-left:22px;">
                <h5>Processed</h5> 
            </div>
            <table class="table">
                <tbody>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6> Total</h6></td>
                    <td style ="text-align:center;"><h6>{{$totalbooking}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Today</h6> </td>
                    <td style ="text-align:center;"><h6>{{$todaybooking}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>This Week</h6></td>
                    <td style ="text-align:center;"><h6>{{$this_week_booking}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Last Week</h6></td>
                    <td style ="text-align:center;"><h6>{{$last_week_booked}}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4 card" >
            <div class="card-header" style="padding-left:22px;">
                <h5>Status</h5>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6> Delivered</h6></td>
                    <td style ="text-align:center;"><h6>{{$totaldelevared}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Undelivered</h6> </td>
                    <td style ="text-align:center;"><h6>{{$undelivered}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6></h6></td>
                    <td style ="text-align:center;"><h6></h6></td>
                    </tr>
                    <tr>
                </tbody>
            </table>
        </div>
    
    </div>
    
    <div class="row" style="margin-top:10px;">
        <div class="col" style="background-color:white;padding:10px;border-radius:5px;">      
          <h4>e-Passport status</h4>    
        </div>
      </div>

    <div class="row" style="margin-top:10px;">
        <!-- <div class="col-4 card" >
            <div class="card-header" style="padding-left:22px;">
                <h5>Received</h5> 
            </div>
            <table class="table">
                <tbody>
                    <tr>                    
                      <td style ="padding-left:20px;"><h6> Total</h6> </td>
                      <td style ="text-align:center;"><h6>{{$etotalreceived}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Today</h6> </td>
                    <td style ="text-align:center;"><h6>{{$etodayreceived}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>This Week</h6></td>
                    <td style ="text-align:center;"><h6>{{$ethis_week_data}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Last Week</h6></td>
                    <td style ="text-align:center;"><h6>{{$elast_week}}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>      -->



        <div class="col-4 card">
            <div class="card-header" style="padding-left:22px;">
                <h5>Processed</h5> 
            </div>
            <table class="table">
                <tbody>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6> Total</h6></td>
                    <td style ="text-align:center;"><h6>{{$etotalbooking}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Today</h6> </td>
                    <td style ="text-align:center;"><h6>{{$etodaybooking}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>This Week</h6></td>
                    <td style ="text-align:center;"><h6>{{$ethis_week_booking}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Last Week</h6></td>
                    <td style ="text-align:center;"><h6>{{$elast_week_booked}}</h6></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-4 card" style="width: 22rem;">
            <div class="card-header" style="padding-left:1.3rem">
                <h5>Status</h5>
            </div>
            <table class="table">
                <tbody>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6> Delivered</h6></td>
                    <td style ="text-align:center;"><h6>{{$etotaldelevared}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6>Undelivered</h6> </td>
                    <td style ="text-align:center;"><h6>{{$eundelivered}}</h6></td>
                    </tr>
                    <tr>
                    
                    <td style ="padding-left:20px;"><h6></h6></td>
                    <td style ="text-align:center;"><h6></h6></td>
                    </tr>
                    <tr>                   
                    
                </tbody>
            </table>
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