<script>
	@if(Session::has('notification'))
	var type = "{{ Session::get('notification.alert-type', 'info') }}";
	switch(type){
		case 'info':
		toastr.info("{{ Session::get('notification.message') }}");
		break;
		case 'warning':
		toastr.warning("{{ Session::get('notification.message') }}");
		break;
		case 'success':
		toastr.success("<strong>Yeeaahh !</strong> {{ Session::get('notification.message') }}");
		break;
		case 'error':
		toastr.error("{{ Session::get('notification.message') }}");
		break;
	}

	var form = "{{ Session::get('notification.form') }}";
	
	if (form == 'login') {
		$("#form-login").show();
		$("#form-forgot").hide();
	} else {
		$("#form-forgot").show();
		$("#form-login").hide();		
	}
	@endif
</script>