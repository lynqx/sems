@extends('layouts.content')

@section('content')

    <div class="login-container">

        <div class="login-header">

            <div class="login-content">

                <a href="#" class="logo">
                    <img src="assets/images/logo2.png" alt="" width="150" />
                </a>

                <p class="description">Dear Art Ramandii, enter your password to unlock the screen!</p>

                <!-- progress bar indicator -->
                <div class="login-progressbar-indicator">
                    <h3>0%</h3>
                    <span>logging in...</span>
                </div>
            </div>

        </div>

        <div class="login-form">

            <div class="login-content">

                <form method="post" role="form" id="form_lockscreen">

                    <div class="form-group lockscreen-input">

                        <div class="lockscreen-thumb">
                            <img src="" width="140" alt="" class="img-circle" />

                            <div class="lockscreen-progress-indicator">0%</div>
                        </div>

                        <div class="lockscreen-details">
                            <h4>Art Ramadani</h4>
                            <span data-login-text="logging in...">logged off</span>
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off" />
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            Login In
                        </button>
                    </div>

                </form>


                <div class="login-bottom-links">

                    <a href="extra-login.html" class="link">Sign in using different account <i class="entypo-right-open"></i></a>

                    <br />

                    <a href="#">ToS</a>  - <a href="#">Privacy Policy</a>

                </div>

            </div>

        </div>

    </div>

@endsection
