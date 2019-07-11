@extends('school.layouts.app')

@section('title')
Dashboard
@endsection

@section('content')

<!-- BEGIN PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<i class="fa fa-home"></i>
			<a href="{{ route('school.dashboard') }}">Dashboard</a>
		</li>
	</ul>
</div>
<h3 class="page-title">
	Dashboard
	<!-- small>reports & statistics</small -->
</h3>
<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS -->
<div class="row">
	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="dashboard-stat blue-madison">
			<div class="visual">
				<i class="fa fa-comments"></i>
			</div>
			<div class="details">
				<div class="number">
					0
				</div>
				<div class="desc">
					Total Students
				</div>
			</div>
			<a class="more" href="#">
				View more <i class="fa fa-arrow-right" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</div>
<!-- END DASHBOARD STATS -->
<div class="clearfix">
</div>

@endsection