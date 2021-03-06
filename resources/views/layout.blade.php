<?php
        /*
session_start();
$member = $_SESSION['user_session'];
$r = $crud->get_user($member);
if($r->num_rows > 0) {
    $user = $r->fetch_assoc();
    $username = $user['username'];
    $avatar = $user['dp'];
}

        */

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="School Management Portal" />
    <meta name="author" content="" />

    <link rel="icon" href="assets/images/favicon.ico">

    <title>
        <?php

        // Check for a $page_title value:
        $pagetitle = 'SEMS | Number 1 School Enterprise Management System';
        if (!isset($page_title)) {
            echo $pagetitle;

        } else {
            echo $page_title .' | School Enterprise Management System';
        }
        ?>
    </title>

    <link rel="stylesheet" href="{{URL::asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/font-icons/entypo/css/entypo.css')}}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-core.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-forms.')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">

    <script src="{{URL::asset('assets/js/jquery-1.11.3.min.js')}}"></script>

    <!--[if lt IE 9]><script src="{{URL::asset('assets/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->

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

            dispTime = hours + ":"+ minutes + ":" + seconds + " " + amPm;

            if (document.getElementById) {
                document.getElementById("clockspa").innerHTML = dispTime;
            }
            setTimeout("clock()", 1000);
        }
    </script>

</head>
<body onLoad="clock()" class="page-body  page-left-in" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <div class="sidebar-menu">

        <div class="sidebar-menu-inner">

            <header class="logo-env">

                <!-- logo -->
                <div class="logo">
                    <a href="index.html">
                        <img src="assets/images/logo2.png" width="120" alt="" />
                    </a>
                </div>

                <!-- logo collapse icon -->
                <div class="sidebar-collapse">
                    <a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
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
                        <img src="assets/images/thumb-1.png" width="55" alt="" class="img-circle" />

                        <span>Welcome,</span>
                        <strong>Art Ramadani </strong>
                        <h1>{{notifications}}</h1>
                    </a>
                </div>

                <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
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

                    <span class="close-sui-popup">&times;</span><!-- this is mandatory -->				</div>
            </div>


            <ul id="main-menu" class="main-menu">
                <!-- add class "multiple-expanded" to allow multiple submenus to open -->
                <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
                <li class="opened active">
                    <a href="index.html">
                        <i class="entypo-gauge"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class="has-sub">
                    <a href="#">
                        <i class="entypo-layout"></i>
                        <span class="title">Class</span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{action('CategorysController@create')}}">
                                <span class="title">Create a New Class</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{action('CategorysController@home')}}">
                                <span class="title">View all Classes</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a href="ui-panels.html">
                        <i class="entypo-newspaper"></i>
                        <span class="title">Fees</span>
                    </a>
                    <ul>
                        <li>
                            <a href="ui-panels.html">
                                <span class="title">Add new Fee Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="ui-tiles.html">
                                <span class="title">View all Fee Category</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="mailbox.html">
                        <i class="entypo-mail"></i>
                        <span class="title">Students</span>
                        <span class="badge badge-secondary">8</span>
                    </a>
                    <ul>
                        <li>
                            <a href="mailbox.html">
                                <i class="entypo-inbox"></i>
                                <span class="title">Register a New Student</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailbox-compose.html">
                                <i class="entypo-pencil"></i>
                                <span class="title">View all Students</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="forms-main.html">
                        <i class="entypo-doc-text"></i>
                        <span class="title">Courses</span>
                    </a>
                    <ul>
                        <li>
                            <a href="forms-main.html">
                                <span class="title">Add a New Subject</span>
                            </a>
                        </li>
                        <li>
                            <a href="forms-advanced.html">
                                <span class="title">View all Subjects</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a href="tables-main.html">
                        <i class="entypo-window"></i>
                        <span class="title">Assignments</span>
                    </a>
                    <ul>
                        <li>
                            <a href="tables-main.html">
                                <span class="title">Add Assignments</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">
                                <span class="title">Pending Assignments</span>
                            </a>
                        </li>
                        <li>
                            <a href="tables-datatable.html">
                                <span class="title">Submitted Assignments</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a href="extra-icons.html">
                        <i class="entypo-bag"></i>
                        <span class="title">Timetable</span>
                        <span class="badge badge-info badge-roundless">New</span>
                    </a>
                    <ul>
                        <li class="has-sub">
                            <a href="extra-icons.html">
                                <span class="title">Add Timetable</span>
                                <span class="badge badge-success">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-portlets.html">
                                <span class="title">View Timetable</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="has-sub">
                    <a href="extra-icons.html">
                        <i class="entypo-bag"></i>
                        <span class="title">Reports</span>
                        <span class="badge badge-info badge-roundless">New</span>
                    </a>
                            <ul>
                                <li>
                                    <a href="extra-gallery.html">
                                        <span class="title">View Academic Reports</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="extra-gallery-single.html">
                                        <span class="title">View Payment Reports</span>
                                    </a>
                                </li>
                            </ul>
                </li>

                <li class="has-sub">
                    <a href="extra-icons.html">
                        <i class="entypo-bag"></i>
                        <span class="title">Notifications</span>
                        <span class="badge badge-info badge-roundless">New</span>
                    </a>
                    <ul>
                        <li>
                            <a href="extra-gallery.html">
                                <span class="title">Add Upcoming Events</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-gallery-single.html">
                                <span class="title">Add School News</span>
                            </a>
                        </li>
                        <li>
                            <a href="extra-gallery-single.html">
                                <span class="title">Notify Parents</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="charts.html">
                        <i class="entypo-cog"></i>
                        <span class="title">Settings</span>
                    </a>
                </li>
            </ul>

        </div>

    </div>

    <div class="main-content">

        <div class="row">

            <!-- Profile Info and Notifications -->
            <div class="col-md-6 col-sm-8 clearfix">

                <ul class="user-info pull-left pull-none-xsm">


                    <ul class="user-info pull-left pull-right-xs pull-none-xsm">

                        <!-- Raw Notifications -->
                        <li class="notifications dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="entypo-attention"></i>
                                <span class="badge badge-info">6</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="top">
                                    <p class="small">
                                        <a href="#" class="pull-right">Mark all Read</a>
                                        You have <strong>3</strong> new notifications.
                                    </p>
                                </li>

                                <li>
                                    <ul class="dropdown-menu-list scroller">
                                        <li class="unread notification-success">
                                            <a href="#">
                                                <i class="entypo-user-add pull-right"></i>
											
											<span class="line">
												<strong>New user registered</strong>
											</span>
											
											<span class="line small">
												30 seconds ago
											</span>
                                            </a>
                                        </li>

                                        <li class="unread notification-secondary">
                                            <a href="#">
                                                <i class="entypo-heart pull-right"></i>
											
											<span class="line">
												<strong>Someone special liked this</strong>
											</span>
											
											<span class="line small">
												2 minutes ago
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-primary">
                                            <a href="#">
                                                <i class="entypo-user pull-right"></i>
											
											<span class="line">
												<strong>Privacy settings have been changed</strong>
											</span>
											
											<span class="line small">
												3 hours ago
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-danger">
                                            <a href="#">
                                                <i class="entypo-cancel-circled pull-right"></i>
											
											<span class="line">
												John cancelled the event
											</span>
											
											<span class="line small">
												9 hours ago
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-info">
                                            <a href="#">
                                                <i class="entypo-info pull-right"></i>
											
											<span class="line">
												The server is status is stable
											</span>
											
											<span class="line small">
												yesterday at 10:30am
											</span>
                                            </a>
                                        </li>

                                        <li class="notification-warning">
                                            <a href="#">
                                                <i class="entypo-rss pull-right"></i>
											
											<span class="line">
												New comments waiting approval
											</span>
											
											<span class="line small">
												last week
											</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="external">
                                    <a href="#">View all notifications</a>
                                </li>
                            </ul>

                        </li>

                        <!-- Message Notifications -->
                        <li class="notifications dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="entypo-mail"></i>
                                <span class="badge badge-secondary">10</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <form class="top-dropdown-search">

                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search anything..." name="s" />
                                        </div>

                                    </form>

                                    <ul class="dropdown-menu-list scroller">
                                        <li class="active">
                                            <a href="#">
											<span class="image pull-right">
												<img src="assets/images/thumb-1@2x.png" width="44" alt="" class="img-circle" />
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
												<img src="assets/images/thumb-2@2x.png" width="44" alt="" class="img-circle" />
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
												<img src="assets/images/thumb-3@2x.png" width="44" alt="" class="img-circle" />
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
												<img src="assets/images/thumb-4@2x.png" width="44" alt="" class="img-circle" />
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
                                    <a href="mailbox.html">All Messages</a>
                                </li>
                            </ul>

                        </li>

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
                            <img src="assets/images/flags/flag-ng.png" width="16" height="16" />
                        </a>

                    </li>

                    <li class="sep"></li>

                    <li>
                        <a href="extra-login.html">
                            Log Out <i class="entypo-logout right"></i>
                        </a>
                    </li>
                </ul>

            </div>

        </div>

        <hr />

        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <h4><?php echo date("M  j").', '.date("Y"); ?> || <span id="clockspa"></span></h4>
                    <h4>Welcome to<strong> Christ Way College</strong></h4>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="row">

                <div class="col-sm-9">

        @yield('content')

                </div>

                <div class="col-sm-3">

                    <div class="tile-progress tile-red">
                        <div class="tile-header">
                            <h3>Students</h3>
                            <span>Total Number of students registered this term.</span>
                        </div>

                        <div class="tile-progressbar">
                            <span data-fill="187"></span>
                        </div>

                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter">0</span> students
                            </h4>
                            <span>so far this term</span>
                        </div>
                    </div>

                    <div class="tile-progress tile-green">
                        <div class="tile-header">
                            <h3>New Students</h3>
                            <span>Number of students who joined the school this term.</span>
                        </div>

                        <div class="tile-progressbar">
                            <span data-fill="21"></span>
                        </div>

                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter">0</span> students
                            </h4>

                            <span>Newly registered student this term alone</span>
                        </div>
                    </div>

                    <div class="tile-progress tile-aqua">
                        <div class="tile-header">
                            <h3>Outstanding Fees</h3>
                            <span>Total number of students who have not paid their school fees this term.</span>
                        </div>

                        <div class="tile-progressbar">
                            <span data-fill="89"></span>
                        </div>

                        <div class="tile-footer">
                            <h4>
                                <span class="pct-counter">0</span> students
                            </h4>

                            <span>students have not paid this term</span>
                        </div>
                    </div>

                </div>
            </div>



        <!-- Footer -->
        <footer class="main">

            &copy; <?php echo date('Y'); ?> <strong>SEMS</strong> School Enterprise Management System by <a href="#" target="_blank">Lynqx Technologies</a>

        </footer>
    </div>

</div>

<!-- Sample Modal (Default skin) -->
<div class="modal fade" id="sample-modal-dialog-1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Widget Options - Default Modal</h4>
            </div>

            <div class="modal-body">
                <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Sample Modal (Skin inverted) -->
<div class="modal invert fade" id="sample-modal-dialog-2">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Widget Options - Inverted Skin Modal</h4>
            </div>

            <div class="modal-body">
                <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Sample Modal (Skin gray) -->
<div class="modal gray fade" id="sample-modal-dialog-3">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Widget Options - Gray Skin Modal</h4>
            </div>

            <div class="modal-body">
                <p>Now residence dashwoods she excellent you. Shade being under his bed her. Much read on as draw. Blessing for ignorant exercise any yourself unpacked. Pleasant horrible but confined day end marriage. Eagerness furniture set preserved far recommend. Did even but nor are most gave hope. Secure active living depend son repair day ladies now.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!-- Bottom scripts (common) -->
<script src="{{URL::asset('assets/js/gsap/TweenMax.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('assets/js/joinable.js')}}"></script>
<script src="{{URL::asset('assets/js/resizeable.js')}}"></script>
<script src="{{URL::asset('assets/js/neon-api.js')}}"></script>
<script src="{{URL::asset('assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>

<!-- JavaScripts initializations and stuff -->
<script src="{{URL::asset('assets/js/neon-custom.js')}}"></script>


<!-- Demo Settings -->
<script src="{{URL::asset('assets/js/neon-demo.js')}}"></script>

</body>
</html>