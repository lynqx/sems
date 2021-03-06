<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="School Management Portal"/>
    <meta name="author" content=""/>

    <link rel="icon" href="{{URL::asset('assets/images/favicon.ico')}}">

    <title>
        <?php

        // Check for a $page_title value:
        $pagetitle = 'SEMS | Number 1 School Enterprise Management System';
        if (!isset($page_title)) {
            echo $pagetitle;

        } else {
            echo $page_title . ' | School Enterprise Management System';
        }
        ?>
    </title>

    <link rel="stylesheet" href="{{URL::asset('vendors/jquery-ui/themes/base/all.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/font-icons/entypo/css/entypo.css')}}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-core.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-forms.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">

    <script src="{{URL::asset('vendors/jquery/dist/jquery.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{URL::asset('assets/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script language="javascript">
        function clock() {
            var now = new Date();
            var hours = now.getHours();
            var amPm = (hours > 11) ? "pm" : "am";
            hours = (hours > 12) ? hours - 12 : hours;

            var minutes = now.getMinutes();
            minutes = (minutes < 10) ? "0" + minutes : minutes;

            var seconds = now.getSeconds();
            seconds = (seconds < 10) ? "0" + seconds : seconds;

            dispTime = hours + ":" + minutes + ":" + seconds + " " + amPm;

            if (document.getElementById) {
                document.getElementById("clockspa").innerHTML = dispTime;
            }
            setTimeout("clock()", 1000);
        }
    </script>

</head>
<body onLoad="clock()" class="page-body  page-left-in">

<div class="page-container">
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="#">
                        <img src="{{URL::asset('assets/images/lylogo2.png')}}" width="120" alt=""/>
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon">
                        <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>


                <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
                <div class="sidebar-mobile-menu visible-xs">
                    <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                        <i class="entypo-menu"></i>
                    </a>
                </div>

            </header>

            <div class="sidebar-user-info">

                <div class="sui-normal">
                    <a href="#" class="user-link">
                        <img src="{{URL::asset('assets/images/thumb-1.png')}}" width="55" alt="" class="img-circle"/>
                        <span>Welcome,</span>
                        <strong>{{Auth::user()->firstname}} {{Auth::user()->lastname}} </strong>
                        @foreach(Auth::user()->roles as $role)
                            <p class="label label-info">{{$role->name}}</p>
                        @endforeach
                    </a>
                </div>

                <div class="sui-hover inline-links animate-in">
                    <!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
                    <a href="#">
                        <i class="entypo-pencil"></i>
                        New Page
                    </a>

                    <a href="mailbox.html">
                        <i class="entypo-mail"></i>
                        Inbox
                    </a>

                    <a href="extra-lockscreen.html">
                        <i class="entypo-lock"></i>
                        Log Off
                    </a>

                    <span class="close-sui-popup">&times;</span><!-- this is mandatory -->                </div>
            </div>


            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li class="opened active">
                    <a href="/">
                        <i class="entypo-gauge"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                @if(Auth::user()->hasRole('Admin'))
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-layout"></i>
                            <span class="title">Class</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Category\CreateController@home')}}">
                                    <span class="title">Create a New Class</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Category\IndexController@home')}}">
                                    <span class="title">View all Classes</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-newspaper"></i>
                            <span class="title">Fees</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Fee\CreateController@home')}}">
                                    <span class="title">Add New Fee Type</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{action('Fee\IndexController@home')}}">
                                    <span class="title">View all Fee Types</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Fee\CreateController@feelist')}}">
                                    <span class="title">Create Fee Items</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-users"></i>
                            <span class="title">Students</span>
                            <span class="badge badge-secondary">8</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Students\CreateController@home')}}">
                                    <i class="entypo-inbox"></i>
                                    <span class="title">Admit a New Student</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Students\IndexController@home')}}">
                                    <i class="entypo-pencil"></i>
                                    <span class="title">View Students by Class</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Students\IndexController@home')}}">
                                    <i class="entypo-pencil"></i>
                                    <span class="title">View all Students</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-briefcase"></i>
                            <span class="title">Parents</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Parents\CreateController@home')}}">
                                    <i class="entypo-inbox"></i>
                                    <span class="title">Add Parents</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Parents\IndexController@home')}}">
                                    <i class="entypo-pencil"></i>
                                    <span class="title">View all Parents</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-mail"></i>
                            <span class="title">Teachers</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Teachers\CreateController@home')}}">
                                    <i class="entypo-users-add"></i>
                                    <span class="title">Register Teachers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Teachers\IndexController@home')}}">
                                    <i class="entypo-pencil"></i>
                                    <span class="title">View all Teachers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-doc-text"></i>
                            <span class="title">Subjects</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Subjects\CreateController@home')}}">
                                    <span class="title">Add a New Subject</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Subjects\IndexController@home')}}">
                                    <span class="title">View all Subjects</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Subjects\ClassController@home')}}">
                                    <span class="title">Add Subjects to Class</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-window"></i>
                            <span class="title">Assignments</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="title">Add Assignments</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Pending Assignments</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Submitted Assignments</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-bag"></i>
                            <span class="title">Timetable</span>
                            <span class="badge badge-info badge-roundless">New</span>
                        </a>
                        <ul>
                            <li class="has-sub">
                                <a href="#">
                                    <span class="title">Add Timetable</span>
                                    <span class="badge badge-success">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Students\TimetableController@home')}}">
                                    <span class="title">View Timetable</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-bag"></i>
                            <span class="title">Library</span>
                            <span class="badge badge-info badge-roundless">New</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Library\CreateController@home')}}">
                                    <span class="title">Add New Books</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Library\IndexController@home')}}">
                                    <span class="title">View All Books</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-bag"></i>
                            <span class="title">Reports</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="title">View Academic Reports</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">View Payment Reports</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-bag"></i>
                            <span class="title">Notifications</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="title">Add Upcoming Events</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Add School News</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Notify Parents</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-bag"></i>
                            <span class="title">Users</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="title">Import Bulk Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">View All Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Assign Roles</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-cog"></i>
                            <span class="title">Settings</span>
                        </a>
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="title">School Details</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Academic Settings</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{action('Sessions\CreateController@home')}}">
                                    <span class="title">Sessions</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="title">Modules Settings</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                @elseif(Auth::user()->hasRole('Parents'))
                    <li class="has-sub">
                        <a href="#">
                            <i class="entypo-layout"></i>
                            <span class="title">Children</span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{action('Children\IndexController@home')}}">
                                    <span class="title">View all Children</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>

        </div>

    </div>

    <div class="main-content">

        <div class="row">

            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">

                <ul class="user-info pull-left pull-none-xsm">

                    <li>
                        <ul class="user-info pull-left pull-right-xs pull-none-xsm">

                            <!-- Raw Notifications -->
                            <li class="notifications dropdown">

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                                   data-close-others="true">
                                    <i class="entypo-attention"></i>
                                    <span class="badge badge-info">{{$notificationsCount}}</span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="top">
                                        <p class="small">
                                            <a href="#" class="pull-right">Mark all Read</a>
                                            You have <strong>{{$notificationsCount}}</strong> new notifications.
                                        </p>
                                    </li>

                                    <li>
                                        <ul class="dropdown-menu-list scroller">
                                            @foreach($notifications as $notification)
                                                <li class="unread notification-success">
                                                    <a href="#">
                                                        <i class="entypo-user-add pull-right"></i>
											
											<span class="line">
												<strong>{{$notification->notification}}</strong>
											</span>
											
											<span class="line small">
												30 seconds ago
											</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="external">
                                        <a href="#">View all notifications</a>
                                    </li>
                                </ul>

                            </li>

                        </ul>
                    </li>

                    <!-- Message Notifications -->
                    <li class="notifications dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="entypo-mail"></i>
                            <span class="badge badge-secondary">10</span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <form class="top-dropdown-search">

                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search anything..."
                                               name="s"/>
                                    </div>

                                </form>

                                <ul class="dropdown-menu-list scroller">
                                    <li class="active">
                                        <a href="#">
											<span class="image pull-right">
												<img src="assets/images/thumb-1@2x.png" width="44" alt=""
                                                     class="img-circle"/>
											</span>

											<span class="line">
												<strong>Luc Chartier</strong>
												- yesterday
											</span>

											<span class="line desc small">
												This ain�t our first item, it is the best of the rest.
											</span>
                                        </a>
                                    </li>

                                    <li class="active">
                                        <a href="#">
											<span class="image pull-right">
												<img src="assets/images/thumb-2@2x.png" width="44" alt=""
                                                     class="img-circle"/>
											</span>

											<span class="line">
												<strong>Salma Nyberg</strong>
												- 2 days ago
											</span>

											<span class="line desc small">
												Oh he decisively impression attachment friendship so if everything.
											</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
											<span class="image pull-right">
												<img src="assets/images/thumb-3@2x.png" width="44" alt=""
                                                     class="img-circle"/>
											</span>

											<span class="line">
												Hayden Cartwright
												- a week ago
											</span>

											<span class="line desc small">
												Whose her enjoy chief new young. Felicity if ye required likewise so doubtful.
											</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a href="#">
											<span class="image pull-right">
												<img src="assets/images/thumb-4@2x.png" width="44" alt=""
                                                     class="img-circle"/>
											</span>

											<span class="line">
												Sandra Eberhardt
												- 16 days ago
											</span>

											<span class="line desc small">
												On so attention necessary at by provision otherwise existence direction.
											</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="external">
                                <a href="#">All Messages</a>
                            </li>
                        </ul>

                    </li>
                </ul>

            </div>


            <!-- Raw Links -->
            <div class="col-md-6 col-sm-4 clearfix hidden-xs">

                <ul class="list-inline links-list pull-right">

                    <!-- Language Selector -->
                    <li class="dropdown language-selector">

                        Language: &nbsp;
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                            <img src="{{URL::asset('assets/images/flags/flag-ng.png')}}" width="16" height="16"/>
                        </a>

                    </li>

                    <li class="sep"></li>

                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout <i class="entypo-logout right"></i>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>

            </div>

        </div>

        <hr/>

        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <small><?php echo date("M  j") . ', ' . date("Y"); ?> || <span id="clockspa"></span></small>
                    <h4>Welcome to<strong> Lynqx Group of Schools</strong></h4>
                    @if(empty($session))
                        <span class="badge badge-danger badge-roundless">NO SESSION</span>
                    @else
                        <span class="badge badge-info badge-roundless">ACADEMIC SESSION: {{$session->start_year}} / {{$session->end_year}} ({{$session->term->name}} Term)</span>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">

                @if(Session::has('errors'))
                    <div class="alert alert-warning">
                        @foreach(Session::get('errors')->all() as $error_message)
                            <p> {{$error_message }} </p>
                        @endforeach
                    </div>
                @endif
                @if(Session::has('message'))
                    <p class="alert alert-info">{{ Session::get('message') }}</p>
                @endif

                <div class="col-sm-12">

                    @yield('content')

                </div>


            </div>


            <!-- Footer -->
            <footer class="main">

                &copy; <?php echo date('Y'); ?> <strong>SEMS</strong> School Enterprise Management System by <a href="#"
                                                                                                                target="_blank">Lynqx
                    Technologies</a>

            </footer>
        </div>

    </div>
</div>


<!-- Imported styles on this page -->
<link rel="stylesheet" href="{{URL::asset('vendors/select2/dist/css/select2.css')}}">
<link rel="stylesheet" href="{{URL::asset('vendors/jquery-selectboxit/src/stylesheets/jquery.selectBoxIt.css')}}">
<link rel="stylesheet" href="{{URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{URL::asset('vendors/iCheck/skins/minimal/_all.css')}}">
<link rel="stylesheet" href="{{URL::asset('vendors/iCheck/skins/square/_all.css')}}">
<link rel="stylesheet" href="{{URL::asset('vendors/iCheck/skins/flat/_all.css')}}">
<link rel="stylesheet" href="{{URL::asset('vendors/iCheck/skins/futurico/futurico.css')}}">
<link rel="stylesheet" href="{{URL::asset('vendors/iCheck/skins/polaris/polaris.css')}}">


<!-- Bottom scripts (common) -->
<script src="{{URL::asset('vendors/gsap/src/minified/TweenMax.min.js')}}"></script>
<script src="{{URL::asset('vendors/jquery-ui/dist/jquery-ui.min.js')}}"></script>
<script src="{{URL::asset('vendors/jquery-validation/dist/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap/dist/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('vendors/jquery-hoverintent/jquery.hoverintent.js')}}"></script>
<script src="{{URL::asset('vendors/ev-emitter/ev-emitter.js')}}"></script>
<script src="{{URL::asset('vendors/imagesloaded/imagesloaded.js')}}"></script>
<script src="{{URL::asset('vendors/blockUI/jquery.blockUI.js')}}"></script>
<script src="{{URL::asset('assets/js/resizeable.js')}}"></script>
<script src="{{URL::asset('assets/js/neon-api.js')}}"></script>


<!-- Imported scripts on this page -->
<script src="{{URL::asset('vendors/select2/dist/js/select2.min.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{URL::asset('vendors/typeahead.js/dist/typeahead.jquery.js')}}"></script>
<script src="{{URL::asset('vendors/jquery-selectboxit/src/javascripts/jquery.selectBoxIt.min.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap-timepicker/js/bootstrap-timepicker.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{URL::asset('vendors/moment/moment.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{URL::asset('vendors/multiselect/js/jquery.multi-select.js')}}"></script>
<script src="{{URL::asset('vendors/iCheck/icheck.min.js')}}"></script>


<script src="{{URL::asset('assets/js/neon-chat.js')}}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{URL::asset('assets/js/neon-custom.js')}}"></script>


<!-- Demo Settings -->
<script src="{{URL::asset('assets/js/neon-demo.js')}}"></script>

</body>
</html>