<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.2
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Login - {{ env('APP_NAME') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME STYLES -->
    <link href="{{ asset('css/components.css') }}" id="style_components" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <style type="text/css">
        span.help-block {
            font-size: 13px;
        }
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->

<body class="login">
    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
    <div class="menu-toggler sidebar-toggler">
    </div>
    <!-- END SIDEBAR TOGGLER BUTTON -->
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="{{ env('APP_NAME') }}" />
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        {{ Form::open(['url' => route('school.login'), 'class'=>'login-form','method'=>'post'])  }}
        <div class="form-title">
            <div class="form-title text-center">
                <h3 class="form-title">Please Login</h3>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">Email</label>
                {{ Form::text('email','', ['class' => 'form-control form-control-solid placeholder-no-fix', 'placeholder'=>'Email'])}}
                @if($errors->has('email'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">Password</label>
                {{ Form::password('password',array('class' => 'form-control form-control-solid placeholder-no-fix','placeholder' => 'Enter password'))}}
                @if($errors->has('password'))
                <span class="help-block">
                    <strong class="text-danger">{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-actions text-center">
                {{ Form::submit('Login', array('class'=>'btn btn-success uppercase btn-login', 'id' => 'loginbtn')) }}
            </div>
            <div class="form-actions">
                <label class="rememberme check">
                    <input type="checkbox" name="remember" value="1" />Remember me
                </label>
            </div>
        </div>
        {{ Form::close() }}
        <!-- END LOGIN FORM -->
    </div>
    <div class="copyright">
        {{ env('APP_NAME') }} &copy; Copyright {{ date('Y') }}, All rights reserved
    </div>

    <!-- END LOGIN -->
    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    <!-- BEGIN CORE PLUGINS -->
    <!--[if lt IE 9]>
<script src="{{ asset('js/respond.min.js') }}"></script>
<script src="{{ asset('js/excanvas.min.js') }}"></script> 
<![endif]-->
    <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-migrate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.uniform.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('js/metronic.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script type="text/javascript">
        $(document).ready(function() {
            Metronic.init(); // init metronic core components
            // Hide Flash Message
            $('div.alert').delay(3000).slideUp(300);

            // hide the success message after 2 sec
            setTimeout(function() {
                $('.message').fadeOut('slow');
            }, 3000);
        });
    </script>
    <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->

</html>