<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insight Free Bootstrap Admin Template</title>
    <!-- Bootstrap Styles-->
    <link href="{{asset('/asset/front/css/bootstrap.css')}}" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="{{asset('/asset/front/css/font-awesome.css')}}" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="{{asset('/asset/front/js/morris/morris-0.4.3.min.css')}}" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="{{asset('/asset/front/css/custom-styles.css')}}" rel="stylesheet" />
    <!-- Google Fonts-->

    <!-- TABLE STYLES-->
    <link href="{{asset('/asset/front/js/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
   <!-- toaster -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

<script type="text/javascript">
    function deleteConfirmation(id) {
        swal({
            title: "Quit the system",
            text: "!!!Do you like to exit from the system Please confirm!",
            type: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Quit!",
            cancelButtonText: "No, cancel!",
            cancelButton:'btn btn-primary',
              confirmButtonColor: 'red',
            cancelButttonColor: '#8CD4F5',



            reverseButtons: !0
        }).then(function (e) {

            if (e.value === true) {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    type: 'get',
                    url: "{{url('/user/exit')}}/",
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',

success: function(response) {
       window.location.href = "/dashboard";
    
                        if (results.success === true) {
                            swal("Done!", results.message, "success");
                        } else {
                            swal("Error!", results.message, "error");
                        }
                    }
                });

            } else {
                e.dismiss;
            }

        }, function (dismiss) {
            return false;
        })
    }

</script>


</head>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><b>C</b>RM</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
               
              
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                       <!--  <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 min</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li> -->
                        <li class="divider"></li>
                        
                    <li>
                            <a href="{{route('mytaskshow')}}">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> My Tasks
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li>
                        
                        <li class="divider"></li>
                       <!--  <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 min</span>
                                </div>
                            </a>
                        </li> -->
                       <!--  <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li> -->
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>

                              <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-sign-out fa-fw"></i>
                                        {{ __('Logout') }}
                                    </a>

                                  
                        </li>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </nav>
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a class=
"{{(request()->is('dashboard')) ? 'active-menu' : '' }}"href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>


                    @can('super-admin')
                     <li>
                        <a class=
"{{(request()->is('users*')) ? 'active-menu' : '' }}" href="{{route('users.show')}}"><i class="fa fa-user"></i>Users</a>
                    </li>
                    @endcan
                    
 <li>
                        <a class=
"{{(request()->is('client*')) ? 'active-menu' : '' }}"href="{{route('client.show')}}"><i class="fa fa-users"></i>Clients</a>
                    </li>
                    @can('super-admin')
                     <li>
                        <a  class="{{(request()->is('department*')) ? 'active-menu' : '' }}"href="{{route('department.show')}}"><i class="fa fa-building-o"></i>Departments</a>
                    </li>
                    @endcan

@can('super-admin')
<li>
                        <a  class="{{(request()->is('purpose/show')) ? 'active-menu' : '' }}"href="{{route('purpose.show')}}"><i class="fa fa-cogs"></i>Purposes</a>
                    </li>

@endcan


                <button class="btn btn-danger" onclick="deleteConfirmation(1)">Delete</button>


<li>
                        <a  class="{{(request()->is('task*')) ? 'active-menu' : '' }}"href="{{route('task.show')}}"><i class="fa fa-briefcase"></i>Task</a>
                    </li>



<li>
                        <a  class="{{(request()->is('ticket')) ? 'active-menu':''}}"href="{{route('ticket')}}"><i class="fa fa-ticket"></i>Ticket Booking</a>
                    </li>


<li>
                        <a  class="{{(request()->is('exit')) ? 'active-menu' : '' }}"href="{{route('exit')}}"><i class="fa fa-id" aria-hidden="true"></i>Exit</a>
                    </li>


<li>
                        <a  class="{{(request()->is('ticket/confirm')) ? 'active-menu':''}}"href="{{route('ticket.confirm')}}"><i class="fa fa-plane"></i>TodayFlight</a>
                    </li>


@can('super-admin')
<li>
                        <a  class="{{(request()->is('attendence')) ? 'active-menu' : '' }}"href="{{route('attend')}}"><i class="fa fa-id" aria-hidden="true"></i>

Attendence</a>
                    </li>

@endcan
 

                   
          </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            










            @yield('child_content')






            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="{{asset('/asset/front/js/jquery-1.10.2.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- Bootstrap Js -->
    <script src="{{asset('/asset/front/js/bootstrap.min.js')}}"></script>
   
    <!-- Metis Menu Js -->
    <script src="{{asset('/asset/front/js/jquery.metisMenu.js')}}"></script>
    <!-- Morris Chart Js -->
    <script src="{{asset('/asset/front/js/morris/raphael-2.1.0.min.js')}}"></script>
    <script src="{{asset('/asset/front/js/morris/morris.js')}}"></script>
  
  
  <script src="{{asset('/asset/front/js/easypiechart.js')}}"></script>
  <script src="{{asset('/asset/front/js/easypiechart-data.js')}}"></script>
  
  
    <!-- Custom Js -->
    <script src="{{asset('/asset/front/js/custom-scripts.js')}}"></script>

<!-- DATA TABLE SCRIPTS -->
    <script src="{{asset('/asset/front/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/asset/front/js/dataTables/dataTables.bootstrap.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  
<!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>


    <script type="text/javascript">


         @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
  @endif


  @if(Session::has('info'))
        toastr.info("{{ Session::get('info') }}");
  @endif


  @if(Session::has('warning'))
        toastr.warning("{{ Session::get('warning') }}");
  @endif


  @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
  @endif


    </script>
<!-- toaster -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
 -->
</body>

</html>