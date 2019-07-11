		</div>
		</div>
		<!-- END CONTENT -->
		</div>
		<!-- END CONTAINER -->
		<!-- BEGIN FOOTER -->
		<div class="page-footer text-center">
			<div class="page-footer-inner">
				{{ env('APP_NAME') }} &copy; Copyright {{ date('Y') }}, All rights reserved
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
		<!-- END FOOTER -->
		<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
		<!-- BEGIN CORE PLUGINS -->
		<!--[if lt IE 9]>
<script src="{{ asset('js/respond.min.js') }}"></script>
<script src="{{ asset('js/excanvas.min.js') }}"></script> 
<![endif]-->
		<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery-migrate.min.js') }}" type="text/javascript"></script>
		<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
		<script src="{{ asset('js/jquery-ui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery.blockui.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/jquery.uniform.min.js') }}" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL PLUGINS -->
		<script src="{{ asset('js/moment.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/moment-timezone.min.js') }}" type="text/javascript"></script>
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="{{ asset('js/metronic.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/layout.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/quick-sidebar.js') }}" type="text/javascript"></script>
		<!-- Pnotify JS -->
		<script src="{{ asset('js/pnotify.custom.min.js') }}" type="text/javascript"></script>
		<!-- Waitme JS -->
		<script src="{{ asset('js/waitMe.min.js') }}" type="text/javascript"></script>
		<script src="{{ asset('js/bootstrap-fileinput.js') }}" type="text/javascript"></script>
		<script type="text/javascript" src="{{ asset('js/jquery-ui.min.js') }}"></script>

		<!-- developer js common function functions -->
		<script src="{{ asset('js/developer.js') }}" type="text/javascript"></script>
		<script type="text/javascript">
			@yield('path')
		</script>
		<!-- END PAGE LEVEL SCRIPTS -->
		<script type="text/javascript">
			$(document).ready(function() {
				Metronic.init(); // init metronic core componets
				Layout.init(); // init layout
				QuickSidebar.init(); // init quick sidebar

				//set the common ajax parameters
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					dataType: 'json',
					error: function(error) {
						if (error.status == 0 || error.readyState == 0) {
							return;
						} else if (error.status == 401) {
							errors = $.parseJSON(error.responseText);
							window.location = errors.redirectTo;
						} else if (error.status == 422) {
							errors = error.responseJSON;

							$.each(errors.errors, function(key, value) {
								if (key.indexOf('.') != -1) {
									let keys = key.split('.');
									let keys_length = keys.length;
									for (let i = 0; i < keys_length; i++) {
										$('.' + keys[0]).find('span.error').eq(keys[1]).empty().addClass('text-danger').text(value).finish().fadeIn();
									}
								} else {
									$('.' + key).find('span.error').empty().addClass('text-danger').text(value).finish().fadeIn();
								}
							});
						} else if (error.status == 400) {
							errors = error.responseJSON;
							if (errors.hasOwnProperty('message')) {
								show_FlashMessage(errors.message, 'error');
							} else {
								show_FlashMessage('Something went wrong!', 'error');
							}
						} else {
							show_FlashMessage('Something went wrong!', 'error');
						}
						//stop ajax loader
						stopLoader("body");
					}
				});

				// Hide Flash Message
				$('div.alert').delay(3000).slideUp(300);
			});
		</script>

		@yield('js')

		<!-- END JAVASCRIPTS -->
		</body>
		<!-- END BODY -->

		</html>