<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
	<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
	<div class="page-sidebar navbar-collapse collapse">
		<!-- BEGIN SIDEBAR MENU -->
		<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
		<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
		<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
		<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
		<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
		<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
		<ul class="page-sidebar-menu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
			<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
			<li class="sidebar-toggler-wrapper">
				<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				<div class="sidebar-toggler margin-bottom-20">
				</div>
				<!-- END SIDEBAR TOGGLER BUTTON -->
			</li>
			<li class="start">
				<a href="{{ route('school.dashboard') }}">
					<span><i class="icon-home"></i></span>
					<span class="title">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="{{ route('school.class.index') }}">
					<span><i class="icon-home"></i></span>
					<span class="title">Manage Classes</span>
				</a>
			</li>
		</ul>
		<!-- END SIDEBAR MENU -->
	</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">