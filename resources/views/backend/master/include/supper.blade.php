<?php

$user = \Auth::user();
//dd($user->role_id);
$rolePermission= App\Models\RolePermission::where('role_id', $user->role_id)->pluck('menu_name')->toArray();

?>


<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="{{url('/')}}">
                <img src="{{asset('backend/images/logo_1.png')}}" alt="Mono">
                <span class="brand-name"> POST OFFICE</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <!-- sidebar menu -->
                <!-- ======================DASHBOARD SECTION================== -->
            <ul class="nav sidebar-inner" id="sidebar-menu">            
                <li class="active">
                    <a class="sidenav-item-link" href="{{url('dashboard')}}">
                    <i class="mdi mdi-briefcase-account-outline"></i>
                    <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <!-- ======================USER SECTION================== -->
                @if (in_array('user-manage', $rolePermission))
                <li>
                    <a class="sidenav-item-link" href="{{Route('adminuser.index')}}">
                    <i class="mdi mdi-chart-line"></i>
                    <span class="nav-text">User Management</span>
                    </a>
                </li>
               @endif
                <!-- ======================BRTA STATUS SECTION================== -->
                @if (in_array('brta-status', $rolePermission))
                <li>
                    <a class="sidenav-item-link" href="{{Route('brta_status_back')}}">
                    <i class="mdi mdi-chart-line"></i>
                    <span class="nav-text">BRTA Status</span>
                    </a>
                </li>
                @endif                
                <!-- ======================BRTA BOOKING STATUS SECTION================== -->

                @if (in_array('brta-booking-status', $rolePermission))
                <li>
                    <a class="sidenav-item-link" href="{{Route('brta_booking_status.index')}}">
                    <i class="mdi mdi-chart-line"></i>
                    <span class="nav-text">BRTA Booking Status</span>
                    </a>
                </li>
                @endif
                @if (in_array('booking-report', $rolePermission))     
                <li>
                    <a class="sidenav-item-link" href="{{Route('brtabooking.report')}}">
                    <i class="mdi mdi-chart-line"></i>
                    <span class="nav-text">BRTA Booking Report</span>
                    </a>
                </li>
                @endif

                <!-- <li class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#brtabooking"
                        aria-expanded="false" aria-controls="brtabooking"><i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">BRTA Booking Status</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="brtabooking">
                        <div class="sub-menu">
                                 
                            <li>
                                <a href="{{Route('brta_booking_status.index')}}">All Booking</a>
                            </li>
                                 
                            <li>
                                <a href="{{Route('brtabooking.report')}}">Booking Report</a>
                            </li>
                                                          
                        </div>
                    </ul>
                </li> -->

                <!-- <li>
                    <a class="sidenav-item-link" href="{{Route('brta_booking_status.index')}}">
                    <i class="mdi mdi-chart-line"></i>
                    <span class="nav-text">Brta booking status</span>
                    </a>
                </li> -->
                

                <!-- ======================ALL OPERATOR SECTION================== -->  
                
                <!-- <li class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#passport"
                    aria-expanded="false" aria-controls="passport">
                    <i class="mdi mdi-email"></i>
                    <span class="nav-text">email</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="passport" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="email-inbox.html">
                                    <span class="nav-text">Email Inbox</span>
                                    
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="email-details.html">
                                    <span class="nav-text">Email Details</span>                                
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="email-compose.html">
                                    <span class="nav-text">Email Compose</span>                               
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>  -->
                
                

                @if (in_array('operator-management', $rolePermission))
                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#operator"
                        aria-expanded="false" aria-controls="operator"><i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">Operator Management</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse" id="operator">
                        <div class="sub-menu">
                            @if (in_array('all-operator', $rolePermission))                          
                            <li>
                                <a href="{{Route('operator.index')}}">All Operator</a>
                            </li>
                            @endif
                            @if (in_array('brta-operator', $rolePermission))      
                            <li>
                                <a href="{{Route('operator.show','3')}}">BRTA Operator</a>
                            </li>
                            @endif
                            @if (in_array('passport-operator', $rolePermission))     
                            <li>
                                <a href="{{Route('operator.edit','4')}}">Passport Operator</a>
                            </li>
                            @endif                               
                        </div>
                    </ul>
                </li>
                @endif

                
                
                @if (in_array('role-management', $rolePermission))
                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#buttons"
                        aria-expanded="false" aria-controls="buttons"><i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">Role Management</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="buttons">
                        <div class="sub-menu">
                            @if (in_array('manage-role', $rolePermission))                          
                            <li>
                                <a href="{{Route('role_add.index')}}">Manage Role</a>
                            </li>
                            @endif
                            @if (in_array('create-role', $rolePermission))      
                            <li>
                                <a href="{{Route('role_add.create')}}">Create Role</a>
                            </li>
                            @endif                               
                        </div>
                    </ul>
                </li>
                @endif

                <!-- ==================================== PASSPORT SECTION =================================== -->
                @if (in_array('passport-management', $rolePermission))
                <li>
                    <a class="sidenav-item-link" href="{{Route('epassport.index')}}">
                    <i class="mdi mdi-wechat"></i>
                    <span class="nav-text">Passport Management</span>
                    </a>
                </li>   
                @endif         

                <!-- @if (in_array('passport-management', $rolePermission))
                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#passport"
                        aria-expanded="false" aria-controls="passport"><i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">Passport Management</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="passport">
                        <div class="sub-menu">
                            @if (in_array('all-passport', $rolePermission))                          
                            <li>
                                <a href="{{Route('epassport.index')}}">All Passport</a>
                            </li>
                            @endif
                            @if (in_array('create-role', $rolePermission))      
                            <li>
                                <a href="{{Route('role_add.create')}}">Create Role</a>
                            </li>
                            @endif                               
                        </div>
                    </ul>
                </li>
                @endif -->



                <!-- <li class="section-title">
                    Apps
                </li> -->
                @if (in_array('e-passport-received', $rolePermission))
                <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#receivedpassport"
                        aria-expanded="false" aria-controls="receivedpassport"><i class="mdi mdi-chart-line"></i>
                        <span class="nav-text">e-Passport Received</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="receivedpassport">
                        <div class="sub-menu">
                            @if (in_array('manage', $rolePermission))
                            <li>
                                <a href="{{Route('epass_received.index')}}">Manage</a>
                            </li>
                            @endif
                            @if (in_array('create', $rolePermission))
                            <li>
                                <a href="{{Route('epass_received.create')}}">Create</a>
                            </li>
                            @endif
                        </div>
                    </ul>
                </li>
                @endif

                <!-- <li>
                    <a class="sidenav-item-link" href="{{Route('epass_received.create')}}">
                    <i class="mdi mdi-wechat"></i>
                    <span class="nav-text">e-Passport Received</span>
                    </a>
                </li> -->
                <!-- <li>
                    <a class="sidenav-item-link" href="contacts.html">
                    <i class="mdi mdi-phone"></i>
                    <span class="nav-text">Contacts</span>
                    </a>
                </li>     
                <li>
                    <a class="sidenav-item-link" href="team.html">
                    <i class="mdi mdi-account-group"></i>
                    <span class="nav-text">Team</span>
                    </a>
                </li>
                <li>
                    <a class="sidenav-item-link" href="calendar.html">
                    <i class="mdi mdi-calendar-check"></i>
                    <span class="nav-text">Calendar</span>
                    </a>
                </li> -->
                <!-- <li class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#email"
                    aria-expanded="false" aria-controls="email">
                    <i class="mdi mdi-email"></i>
                    <span class="nav-text">email</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="email" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="email-inbox.html">
                                    <span class="nav-text">Email Inbox</span>                                    
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="email-details.html">
                                    <span class="nav-text">Email Details</span>                                
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="email-compose.html">
                                    <span class="nav-text">Email Compose</span>                               
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>             -->
                <!-- <li class="section-title">
                    UI Elements
                </li> -->

                <!-- <li class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#ui-elements"
                    aria-expanded="false" aria-controls="ui-elements">
                    <i class="mdi mdi-folder-outline"></i>
                    <span class="nav-text">UI Components</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="ui-elements" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li>
                                <a class="sidenav-item-link" href="alert.html">
                                    <span class="nav-text">Alert</span>                                
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="badge.html">
                                    <span class="nav-text">Badge</span>                                
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="breadcrumb.html">
                                    <span class="nav-text">Breadcrumb</span>                            
                                </a>
                            </li>
                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#buttons"
                                    aria-expanded="false" aria-controls="buttons">
                                    <span class="nav-text">Buttons</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="buttons">
                                    <div class="sub-menu">                                
                                        <li>
                                            <a href="button-default.html">Button Default</a>
                                        </li>
                                        
                                        <li>
                                            <a href="button-dropdown.html">Button Dropdown</a>
                                        </li>
                                        
                                        <li>
                                            <a href="button-group.html">Button Group</a>
                                        </li>
                                        
                                        <li>
                                            <a href="button-social.html">Button Social</a>
                                        </li>
                                        
                                        <li>
                                            <a href="button-loading.html">Button Loading</a>
                                        </li>                                
                                    </div>
                                </ul>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="card.html">
                                    <span class="nav-text">Card</span>                   
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="carousel.html">
                                    <span class="nav-text">Carousel</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="collapse.html">
                                    <span class="nav-text">Collapse</span>
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="editor.html">
                                    <span class="nav-text">Editor</span>                            
                                </a>
                            </li>                    
                            <li>
                                <a class="sidenav-item-link" href="list-group.html">
                                    <span class="nav-text">List Group</span>                            
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="modal.html">
                                    <span class="nav-text">Modal</span>
                                    
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="pagination.html">
                                    <span class="nav-text">Pagination</span>                            
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="popover-tooltip.html">
                                    <span class="nav-text">Popover & Tooltip</span>                            
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="progress-bar.html">
                                    <span class="nav-text">Progress Bar</span>                            
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="spinner.html">
                                    <span class="nav-text">Spinner</span>                            
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="switches.html">
                                    <span class="nav-text">Switches</span>                            
                                </a>
                            </li>
                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#tables"
                                    aria-expanded="false" aria-controls="tables">
                                    <span class="nav-text">Tables</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="tables">
                                    <div class="sub-menu">                                
                                        <li >
                                            <a href="bootstarp-tables.html">Bootstrap Tables</a>
                                        </li>                                    
                                        <li >
                                            <a href="data-tables.html">Data Tables</a>
                                        </li>                                    
                                    </div>
                                </ul>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="tab.html">
                                    <span class="nav-text">Tab</span>                            
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="toaster.html">
                                    <span class="nav-text">Toaster</span>                            
                                </a>
                            </li>
                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#icons"
                                    aria-expanded="false" aria-controls="icons">
                                    <span class="nav-text">Icons</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="icons">
                                    <div class="sub-menu">                            
                                        <li >
                                            <a href="material-icons.html">Material Icon</a>
                                        </li>                            
                                        <li >
                                            <a href="flag-icons.html">Flag Icon</a>
                                        </li>                            
                                    </div>
                                </ul>
                            </li>
                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#forms"
                                    aria-expanded="false" aria-controls="forms">
                                    <span class="nav-text">Forms</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="forms">
                                    <div class="sub-menu">
                                    
                                    <li >
                                        <a href="basic-input.html">Basic Input</a>
                                    </li>
                                    
                                    <li >
                                        <a href="input-group.html">Input Group</a>
                                    </li>
                                    
                                    <li >
                                        <a href="checkbox-radio.html">Checkbox & Radio</a>
                                    </li>
                                    
                                    <li >
                                        <a href="form-validation.html">Form Validation</a>
                                    </li>
                                    
                                    <li >
                                        <a href="form-advance.html">Form Advance</a>
                                    </li>
                                    
                                    </div>
                                </ul>
                            </li>
                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#maps"
                                    aria-expanded="false" aria-controls="maps">
                                    <span class="nav-text">Maps</span> <b class="caret"></b>
                                </a>
                                <ul  class="collapse"  id="maps">
                                    <div class="sub-menu">
                                    
                                    <li >
                                        <a href="google-maps.html">Google Map</a>
                                    </li>
                                    
                                    <li >
                                        <a href="vector-maps.html">Vector Map</a>
                                    </li>
                                    
                                    </div>
                                </ul>
                            </li>
                            <li  class="has-sub" >
                                <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#widgets"
                                    aria-expanded="false" aria-controls="widgets">
                                    <span class="nav-text">Widgets</span> <b class="caret"></b>
                                </a>
                                <ul class="collapse"  id="widgets">
                                    <div class="sub-menu">                                    
                                        <li >
                                            <a href="widgets-general.html">General Widget</a>
                                        </li>                                        
                                        <li >
                                            <a href="widgets-chart.html">Chart Widget</a>
                                        </li>                                    
                                    </div>
                                </ul>
                            </li>
                        </div>
                    </ul>
                </li> -->
                <!-- <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#charts"
                    aria-expanded="false" aria-controls="charts">
                    <i class="mdi mdi-chart-pie"></i>
                    <span class="nav-text">Charts</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="charts" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li >
                                <a class="sidenav-item-link" href="apex-charts.html">
                                    <span class="nav-text">Apex Charts</span>                                    
                                </a>
                            </li>
                        </div>
                    </ul>
                </li> -->
                <!-- <li class="section-title">
                    Pages
                </li> -->
                <!-- <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#users"
                    aria-expanded="false" aria-controls="users">
                    <i class="mdi mdi-image-filter-none"></i>
                    <span class="nav-text">User</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="users" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li >
                                <a class="sidenav-item-link" href="user-profile.html">
                                    <span class="nav-text">User Profile</span>
                                    
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="user-activities.html">
                                    <span class="nav-text">User Activities</span>                                
                                </a>
                            </li>

                            <li >
                                <a class="sidenav-item-link" href="user-profile-settings.html">
                                    <span class="nav-text">User Profile Settings</span>                                
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="user-account-settings.html">
                                    <span class="nav-text">User Account Settings</span>                                
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="user-planing-settings.html">
                                    <span class="nav-text">User Planing Settings</span>                                
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="user-billing.html">
                                    <span class="nav-text">User billing</span>                            
                                </a>
                            </li>
                            <li>
                                <a class="sidenav-item-link" href="user-notify-settings.html">
                                    <span class="nav-text">User Notify Settings</span>                            
                                </a>
                            </li>
                        </div>
                    </ul>
                </li> -->
                <!-- <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#authentication"
                    aria-expanded="false" aria-controls="authentication">
                    <i class="mdi mdi-account"></i>
                    <span class="nav-text">Authentication</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="authentication" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li >
                            <a class="sidenav-item-link" href="sign-in.html">
                                <span class="nav-text">Sign In</span>                            
                            </a>
                            </li>
                            <li >
                            <a class="sidenav-item-link" href="sign-up.html">
                                <span class="nav-text">Sign Up</span>                            
                            </a>
                            </li>
                            <li >
                            <a class="sidenav-item-link" href="reset-password.html">
                                <span class="nav-text">Reset Password</span>                            
                            </a>
                            </li>
                        </div>
                    </ul>
                </li> -->
                <!-- <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#other-page"
                    aria-expanded="false" aria-controls="other-page">
                    <i class="mdi mdi-file-multiple"></i>
                    <span class="nav-text">Other pages</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="other-page" data-parent="#sidebar-menu">
                    <div class="sub-menu">
                        <li >
                        <a class="sidenav-item-link" href="invoice.html">
                            <span class="nav-text">Invoice</span>                            
                        </a>
                        </li>
                        <li >
                        <a class="sidenav-item-link" href="404.html">
                            <span class="nav-text">404 page</span>                            
                        </a>
                        </li>
                        <li >
                        <a class="sidenav-item-link" href="page-comingsoon.html">
                            <span class="nav-text">Coming Soon</span>                            
                        </a>
                        </li>
                        <li>
                            <a class="sidenav-item-link" href="page-maintenance.html"><span class="nav-text">Maintenance</span></a>
                        </li>                    
                        </div>
                    </ul>
                </li> -->
                <!-- <li class="section-title">
                    Documentation
                </li> -->
                <!-- <li>
                    <a class="sidenav-item-link" href="getting-started.html">
                    <i class="mdi mdi-airplane"></i>
                    <span class="nav-text">Getting Started</span>
                    </a>
                </li> -->
                

                

                
                <!-- <li  class="has-sub" >
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse" data-target="#customization"
                    aria-expanded="false" aria-controls="customization">
                    <i class="mdi mdi-square-edit-outline"></i>
                    <span class="nav-text">Customization</span> <b class="caret"></b>
                    </a>
                    <ul  class="collapse"  id="customization" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li >
                                <a class="sidenav-item-link" href="navbar-customization.html">
                                    <span class="nav-text">Navbar</span>                            
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="sidebar-customization.html">
                                    <span class="nav-text">Sidebar</span>                            
                                </a>
                            </li>
                            <li >
                                <a class="sidenav-item-link" href="styling.html">
                                    <span class="nav-text">Styling</span>                            
                                </a>
                            </li>
                        </div>
                    </ul>
                </li> -->
                

                
            </ul>
        </div>

        <!-- <div class="sidebar-footer">
            <div class="sidebar-footer-content">
                <ul class="d-flex">
                    <li><a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
                    <li><a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a></li>
                </ul>
            </div>
        </div> -->
    </div>
</aside>