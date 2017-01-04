@extends('layouts.content')

@section('content')
    <div class="login-container">

        <div class="login-header login-caret">

            <div class="login-content">

                <a href="index.html" class="logo">
                    <img src="{{URL::asset('assets/images/logo2.png')}}" width="120" alt=""/>
                </a>

                <p class="description">Dear user, log in to access your account!</p>

                <!-- progress bar indicator -->
                <div class="login-progressbar-indicator">
                    <h3>43%</h3>
                    <span>logging in...</span>
                </div>
            </div>

        </div>

        <div class="login-progressbar">
            <div></div>
        </div>

        <div class="login-form">

            <div class="login-content">

                <div class="form-login-error">
                    <h5>Invalid login details or Account inactive</h5>
                </div>

                <form method="POST" role="form" action="/login" id="form_login">

                    {{ csrf_field() }}
                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-user"></i>
                            </div>

                            <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                                   autocomplete="off"/>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Password" autocomplete="off"/>
                        </div>

                    </div>

                    <div class="form-group">

                        <input id="token" type="hidden" name="_token" value="{{ csrf_token() }}"/>
                        <button type="submit" class="btn btn-success btn-block btn-login">
                            <i class="entypo-login"></i>
                            Login In
                        </button>
                    </div>


                    <!--

                    You can also use other social network buttons
                    <div class="form-group">

                        <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left twitter-button">
                            Login with Twitter
                            <i class="entypo-twitter"></i>
                        </button>

                    </div>

                    <div class="form-group">

                        <button type="button" class="btn btn-default btn-lg btn-block btn-icon icon-left google-button">
                            Login with Google+
                            <i class="entypo-gplus"></i>
                        </button>

                    </div> -->

                </form>


                <div class="login-bottom-links">

                    <a href="extra-forgot-password.html" class="link">Forgot your password?</a>

                    <br/>

                    <a href="#')}}">ToS</a> - <a href="#">Privacy Policy</a>

                </div>

            </div>

        </div>

    </div>
@endsection
