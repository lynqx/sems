<?php
/**
 * Created by PhpStorm.
 * User: doubleakins
 * Date: 12/16/2016
 * Time: 9:42 AM
 */

?>

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Neon Admin Panel"/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{URL::asset('assets/images/favicon.ico')}}">

    <title>Login | SEMS</title>

    <link rel="stylesheet" href="{{URL::asset('assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/font-icons/entypo/css/entypo.css')}}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-core.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-theme.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/neon-forms.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/css/custom.css')}}">

    <script src="{{URL::asset('assets/js/jquery-1.11.3.min.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{URL::asset('assets/js/ie8-responsive-file-warning.js')}}"></script><![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
    var baseurl = '';
</script>

@yield('content')


        <!-- Bottom scripts (common) -->
<script src="{{URL::asset('assets/js/gsap/TweenMax.min.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
<script src="{{URL::asset('assets/js/bootstrap.js')}}"></script>
<script src="{{URL::asset('assets/js/joinable.js')}}"></script>
<script src="{{URL::asset('assets/js/resizeable.js')}}"></script>
<script src="{{URL::asset('assets/js/neon-api.js')}}"></script>
<script src="{{URL::asset('assets/js/jquery.validate.min.js')}}"></script>
<script src="{{URL::asset('assets/js/neon-login.js')}}"></script>


<!-- JavaScripts initializations and stuff -->
<script src="{{URL::asset('assets/js/neon-custom.js')}}"></script>


<!-- Demo Settings -->
<script src="{{URL::asset('assets/js/neon-demo.js')}}"></script>

</body>
</html>