<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>DealsHistory</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="{{ URL::asset('assets/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/6.5.95/css/materialdesignicons.min.css">

    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <link href="{{ URL::asset('assets/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    <link href="{{ URL::asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
</head>

<body>

    <!--*******************  Preloader start ********************-->

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

  
    <div id="main-wrapper">

        <div class="nav-header">
            <div class="brand-logo">
                <a href="index-2.html">
                    <b class="logo-abbr"><img src="{{ URL::asset('assets/images/logo.png')}}" alt=""> </b>
                    <span class="logo-compact"><img src="{{ URL::asset('assets/images/logo-compact.png')}}" alt=""></span>
                    <span class="brand-title">
                        <img src="{{ URL::asset('assets/images/logo-text.png')}}" alt="">
                    </span>
                </a>
            </div>
        </div>
        
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">   
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                              
                                <i class="mdi mdi-account" style="font-size: 15px;">{{Session::get('user_name')}} {{Session::get('admin_name')}}</i>
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <ul class="profile_ul">
                                            <h6 class="px-3 py-3 font-weight-semibold mb-0">{{Session::get('user_name')}} {{Session::get('admin_name')}}</h6>                                      
                                        </ul>
                                        @if(Session::has('user_id'))    
                                        <li><a href="{{url('userlogout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                        @elseif(Session::has('admin_id'))
                                        <li><a href="{{url('adminlogout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- login code link account -->

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">LINK ACCOUNT</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">USER ID:</label>
                                <input type="text" class="form-control" id="recipient-name">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">PASSWORD:</label>
                                <input type="password" class="form-control" id="recipient-name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                        <button type="button" class="btn btn-primary">LINK</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="{{url('/')}}" aria-expanded="false">
                            <i class="mdi mdi-compass-outline menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    @if(Session::has('admin_id'))
                    <li>
                        <a class="has-arrow" href="{{url('userregister')}}" aria-expanded="false">
                            <i class="icon-copy fa fa-user-o"></i><span class="nav-text">CreateUser</span>
                        </a>
                    </li>
                    @endif
                   

                    {{-- <li>
                        <a class="has-arrow" href="{{url('logout')}}" aria-expanded="false">
                            <i class="mdi mdi-logout menu-icon"></i><span class="nav-text">Logout</span>
                        </a>
                    </li> --}}
                    
                </ul>
            </div>
        </div>


        @yield('content')

        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="">Deals History</a> 2022</p>
            </div>
        </div>

        <script src="{{ URL::asset('assets/plugins/common/common.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/custom.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/settings.js')}}"></script>
        <script src="{{ URL::asset('assets/js/gleek.js')}}"></script>
        <script src="{{ URL::asset('assets/js/styleSwitcher.js')}}"></script>
    
        <!-- Chartjs -->
        <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
        <!-- Circle progress -->
        <script src="{{ URL::asset('assets/plugins/circle-progress/circle-progress.min.js')}}"></script>
        <!-- Datamap -->
        <script src="{{ URL::asset('assets/plugins/d3v3/index.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/topojson/topojson.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/datamaps/datamaps.world.min.js')}}"></script>
        <!-- Morrisjs -->
        <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
        <!-- Pignose Calender -->
        <script src="{{ URL::asset('assets/plugins/moment/moment.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
        <!-- ChartistJS -->
        <script src="{{ URL::asset('assets/plugins/chartist/js/chartist.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
        <!-- Color Picker Plugin JavaScript -->
        <script src="{{ URL::asset('assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')}}"></script>
        <!-- Date Picker Plugin JavaScript -->
        <script src="{{ URL::asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <!-- Date range Plugin JavaScript -->
        <script src="{{ URL::asset('assets/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    
        <script src="{{ URL::asset('assets/js/plugins-init/form-pickers-init.js')}}"></script>
    
        <script src="{{ URL::asset('assets/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{ URL::asset('assets/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/dashboard/dashboard-1.js')}}"></script>
    
    </body>
    
    
    <!-- Mirrored from demo.themefisher.com/quixlab/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 30 Mar 2022 05:45:24 GMT -->
    
    </html>
   
    