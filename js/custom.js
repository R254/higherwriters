// This the sweetalert2 initialization
	$(function() {
		$('#register').click(function(e){

			var valid = this.form.checkValidity();

			if (valid) {

				var f_name 	= $('#f_name').val();
				var l_name 	= $('#l_name').val();
				var email 	= $('#email').val();
				var proffesion 	= $('#proffesion').val();
				var pass 	= $('#pass').val();
				var user = $("input[name='role']:checked").val();
				// var user = $('input[type="radio"]:checked').val();
				// var user = $("input[name='user']:checked").val();
				// var user 	= $('input[name="user"]:selected').val();

				e.preventDefault();

				$.ajax({
					type: 'POST',
					url: 'process.php',
					data: $('#reg-form').serialize(),
					success:function(data){
						Swal.fire({
						  icon: 'success',
						  title: '',
						  text: data,
						  footer: '<a href="login.php">Please Sign In</a>'
						})
					},
					error:function(data){
						Swal.fire({
						  icon: 'error',
						  title: 'Errors',
						  text: data,
						  footer: '<a href="#">Why do I have this issue?</a>'
						})
					}
				});
			}else{
				print("Invalid form");
			}
		});
	});

	// popovers
	$(function () {
	  $('[data-toggle="popover"]').popover()
	});
	
	// sidebar jquery toggler
	$(document).ready(function () {
		$("#sidebarCollapse").on('click', function () {
			$("#sidebar").toggleClass('active');
		});
	});

	// $("#menu-toggle").click(function(e){
	// 	e.preventDefault();
	// 	$("#wrapper").toggleClass("toggled");
	// });