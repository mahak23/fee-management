<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
	<meta charset="utf-8" />
	<title>@yield('title') | Admin - {{ env('APP_NAME') }}</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/simple-line-icons.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="{{ asset('css/components.css') }}" id="style_components" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/layout.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('css/darkblue.css') }}" rel="stylesheet" type="text/css" id="style_color" />
	<!-- Pnotify Css -->
	<link href="{{ asset('css/pnotify.custom.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Waitme Css -->
	<link href="{{ asset('css/waitMe.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Datepicker Css -->
	<link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Fancy Box Css -->
	<link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- Developer Css -->
	<link href="{{ asset('css/developer.css') }}" rel="stylesheet" type="text/css" />
	<!-- END THEME STYLES -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-fileinput.css') }}" />
	<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
	@yield('css')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->

<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-closed-hide-logo page-container-bg-solid">
	<!-- BEGIN HEADER -->
	<div class="page-header -i navbar navbar-fixed-top">
		<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
			<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="{{ route('school.dashboard') }}">
					<img src="{{ asset('/images/logo.png') }}" width="46" alt="env('APP_NAME')" />
				</a>
				<div class="menu-toggler sidebar-toggler hide">
				</div>
			</div>
			<!-- END LOGO -->
			<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			</a>
			<!-- END RESPONSIVE MENU TOGGLER -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<img src="{{ asset('/images/default.jpg') }}" class="img-circle display-profile-image" alt="Profile Pic">
							<span class="username username-hide-on-mobile" id="header_username">
								{{Auth::user()->first_name}} </span>
							<i class="fa fa-angle-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="{{ route('school.logout') }}">
									<i class="icon-key"></i> Log Out
								</a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN QUICK SIDEBAR TOGGLER -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->

					<!-- END QUICK SIDEBAR TOGGLER -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END HEADER INNER -->
	</div>
	<!-- END HEADER -->
	<div class="clearfix">
	</div>
	<!-- BEGIN CONTAINER -->
	<div class="page-container">