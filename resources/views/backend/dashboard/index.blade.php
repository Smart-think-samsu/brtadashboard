<?php

$user = \Auth::user();
//dd($user->role_id);
$rolePermission= App\Models\RolePermission::where('role_id', $user->role_id)->pluck('menu_name')->toArray();

?>



@extends('backend.master.layout.app')
@section('content')
<!-- ====================================
——— CONTENT WRAPPER
===================================== -->
<div class="content-wrapper">
  <div class="content">                
        <!-- Top Statistics -->
      @if (in_array('dashboard-licence-status', $rolePermission))
      <div class="row">
        <div class="col" style="background-color:white;padding:10px;border-radius:5px;">      
          <h4>BRTA Licence status</h4>  
        </div>
      </div>
      @endif
    <div class="row" style="margin-top:10px;">
      @if (in_array('dashboard-licence-received', $rolePermission))
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
      @endif
      @if (in_array('dashboard-licence-processed', $rolePermission))
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
      @endif
      @if (in_array('dashboard-brta-status', $rolePermission))
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
      @endif
    </div>
    @if(in_array('dashboard-passport-status', $rolePermission))
      <div class="row" style="margin-top:10px;">
        <div class="col" style="background-color:white;padding:10px;border-radius:5px;">      
          <h4>e-Passport status</h4>    
        </div>
      </div>
    @endif
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


        @if(in_array('dashboard-passport-process', $rolePermission))
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
        @endif
        @if(in_array('dashboard-passport-status', $rolePermission))
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
        @endif
    
    </div>

    <!-- <div class="row">
      <div class="col-12">     
        
        <div class="card card-default">
          <div class="card-header">
            <h2>Precess And Delivery</h2>
            <div class="dropdown">
              <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" data-display="static">
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </div>

          </div>
          <div class="card-body">
            <div class="chart-wrapper">
              <div id="mixed-chart-1"></div>
            </div>
          </div>

        </div>


      </div>
      
      </div>
    </div> -->



  </div>
</div>
@endsection