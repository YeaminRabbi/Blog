<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('anotherassets/images/favicon.ico')}}">
        <link href="{{asset('anotherassets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" />
        <!-- C3 Chart css -->
        <link href="{{asset('anotherassets/libs/c3/c3.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="{{asset('anotherassets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
        <link href="{{asset('anotherassets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />
        <link href="{{asset('assets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/libs/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />

        <link href="{{asset('anotherassets/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />


            <!-- third party css -->
    <link href="{{asset('anotherassets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('anotherassets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('anotherassets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />

     <!-- App css -->
     <link href="{{asset('anotherassets/libs/custombox/custombox.min.css')}}" rel="stylesheet" type="text/css" >
     <link href="{{asset('anotherassets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
     <link href="{{asset('anotherassets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
     <link href="{{asset('anotherassets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />


        <link href="{{asset('anotherassets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet" />
        <link href="{{asset('anotherassets/libs/switchery/switchery.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/libs/select2/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/libs/bootstrap-select/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css')}}" rel="stylesheet" type="text/css" />

        <link href="assets/libs/custombox/custombox.min.css" rel="stylesheet" type="text/css" >

        <!-- App css -->
     
        <link href="{{asset('anotherassets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('anotherassets/css/app.min.css')}}" rel="stylesheet" type="text/css"  id="app-stylesheet" />


    </head>

    <body>
       

        <!-- Begin page -->
        <div id="wrapper">

            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{asset('anotherassets/images/users/avatar-1.jpg')}}" alt="user-image" class="rounded-circle">                          
                        </a>  
                                    
                       
                    </li>
                </ul>

               

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>

                </ul>
            </div>
            <!-- end Topbar -->

            
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul class="metismenu" id="side-menu">

                          

                            <li class="menu-title" style="font-size: 26px;">Components</li>


                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-box"></i>
                                    <span style="font-size: 20px;"> Channel </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('userChannelName')}}">Name</a></li>
                                    
                                </ul>
                            </li>
                           
                            

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-box"></i>
                                    <span style="font-size: 20px;">  Write Blog </span>
                                    <span class="menu-arrow"></span>
                                </a>

                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="{{route('users.users_blogs.create')}}">Create</a></li>
                                    <li><a href="{{route('users.users_blogs.list')}}">List</a></li>
                                    <li><a href="{{route('users.users_blogs.review')}}">Review Comments List</a></li>
                                </ul>
                            </li>
                           
                            
                            <li>
                                <a href="{{ route('homepage') }}">
                                    <i class="fe-box"></i>
                                    <span style="font-size: 20px;">  Main Website  </span>
                                    
                                </a>

                               
                            </li>
                       

                  
                
                   

                         
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            @yield('content')
            
          
            


           

            <script src="{{asset('anotherassets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

            <script src="{{asset('anotherassets/js/pages/sweet-alerts.init.js')}}"></script>
     
            <!-- Vendor js -->
            <script src="{{asset('anotherassets/js/vendor.min.js')}}"></script>
    
            <!--C3 Chart-->
            <script src="{{asset('anotherassets/libs/d3/d3.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/c3/c3.min.js')}}"></script>
    
            <script src="{{asset('anotherassets/libs/echarts/echarts.min.js')}}"></script>
    
            <script src="{{asset('anotherassets/js/pages/dashboard.init.js')}}"></script>
    
             <!-- Vendor js -->
             <script src="{{asset('anotherassets/js/vendor.min.js')}}"></script>
    
             <!-- plugin js -->
             <script src="{{asset('anotherassets/libs/switchery/switchery.min.js')}}"></script>
             <script src="{{asset('anotherassets/libs/moment/moment.min.js')}}"></script>
             <script src="{{asset('anotherassets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
             <script src="{{asset('anotherassets/libs/fullcalendar/fullcalendar.min.js')}}"></script>
            
             <!-- Calendar init -->
             <script src="{{asset('anotherassets/js/pages/calendar.init.js')}}"></script>
    
    
              <!-- Required datatable js -->
            <script src="{{asset('anotherassets/libs/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/datatables/dataTables.bootstrap4.min.js')}}"></script>
            <!-- Buttons examples -->
            <script src="{{asset('anotherassets/libs/datatables/dataTables.buttons.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/datatables/buttons.bootstrap4.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/jszip/jszip.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/pdfmake/pdfmake.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/pdfmake/vfs_fonts.js')}}"></script>
            <script src="{{asset('anotherassets/libs/datatables/buttons.html5.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/datatables/buttons.print.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/datatables/buttons.colVis.js')}}"></script>
    
            <!-- Responsive examples -->
            <script src="{{asset('anotherassets/libs/datatables/dataTables.responsive.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    
            <!-- Datatables init -->
            <script src="{{asset('anotherassets/js/pages/datatables.init.js')}}"></script>
    
            <!-- App js -->
            <script src="{{asset('anotherassets/js/app.min.js')}}"></script>
    
    
            
            <script src="{{asset('anotherassets/libs/switchery/switchery.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/select2/select2.min.js')}}"></script>
            <script src="{{asset('anotherassets/libs/jquery-mockjax/jquery.mockjax.min.js')}}"></script>

      
            <script src="{{asset('anotherassets/libs/custombox/custombox.min.js')}}"></script>

       
       
    </body>
</html>