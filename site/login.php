<!DOCTYPE html>
<html>
<head>
<title>Gray Analytics - Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- CND Links -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href="../css/site.css" rel="stylesheet" type="text/css" media="all" />
<script src="../js/validate.js"></script>

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
    <img src="../images/ga-logo-white@2x.png" />
		<h1>Account Access</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
        <div class="row">
          <div class="col-md-6">
            <a href="#" class="active" id="login-form-link">Login</a>
          </div>
          <div class="col-md-6">
            <a href="#" id="register-form-link">Register</a>
          </div>
        </div>
        <form id="login-form" action="#" method="post" role="form" style="display: block;">
          <div class="col-md-12">
  					<input class="text email" type="email" name="email" placeholder="Email" required="">
  					<input class="text" type="password" name="password" placeholder="Password" required="">
          </div>
					<input type="submit" value="SIGNUP">
				</form>

        <form id="register-form" action="register_confirm.php" method="post" role="form" style="display: none;">
          <div class="col-md-12" style="padding: 0.8em;">
            <input class="text w3lpass" type="text" name="first_name" placeholder="First Name" required="">
            <input class="text w3lpass" type="text" name="last_name" placeholder="Last name" required="">
            <input class="text w3lpass" type="text" name="phone" placeholder="555-555-5555" required="">
            <input class="text w3lpass" type="text" name="org" placeholder="Organization" required="">
  					<input class="text email" type="email" name="email" placeholder="Email" required="">
  					<input class="text" type="password" name="password" placeholder="Password" required="" id="password">
  					<input class="text w3lpass" type="password" name="password_conf" placeholder="Confirm Password" required="" id="password_conf" onchange="checkPasswordMatch();">
            <div class="divPassMatch" id="divPassMatch"></div>
          </div>
          <!-- <div class="divPassMatch" id="divPassMatch"></div> -->
					<div class="wthree-text form-check form-check-inline">
						<label class="anim">
							<input class="form-check-input" type="checkbox" class="checkbox" required="" id="chbxTerms">
							<label class="form-check-label" for="chbxTerms">I agree to the terms and condidtions.</label>
						<div class="clear"> </div>
					</div>

					<input type="submit" value="SIGNUP" name="register_form">
				</form>
			</div>
		</div>
    <?php include '../includes/footer.php'; ?>
	</div>
	<!-- //main -->
  <script>
  $(function() {
      $('#login-form-link').click(function(e) {
      $("#login-form").delay(100).fadeIn(100);
      $("#register-form").fadeOut(100);
      $('#register-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });
    $('#register-form-link').click(function(e) {
      $("#register-form").delay(100).fadeIn(100);
      $("#login-form").fadeOut(100);
      $('#login-form-link').removeClass('active');
      $(this).addClass('active');
      e.preventDefault();
    });
    });
  </script>
</body>
</html>
