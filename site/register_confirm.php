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

<?php
include '../includes/db_conn.php';
// Grab POST variables
$firstname     = trim($_POST['first_name'] ?? '');
$lastname      = trim($_POST['last_name'] ?? '');
$org           = trim($_POST['org'] ?? '');
$email         = trim($_POST['email'] ?? '');
$phone         = trim($_POST['phone'] ?? '');
$password      = hash('sha256', $_POST['password'] ?? '');
$password_conf = hash('sha256', $_POST['password_conf'] ?? '');
// prepare and bind
$sql = $conn->prepare("INSERT INTO tbl_users (first_name, last_name, email, phone, password, organization) VALUES (?, ?, ?, ?, ?, ?)");
$sql->bind_param("ssssss",$firstname, $lastname, $email, $phone, $password, $org);
// Check the register form was submitted
if (isset($_POST['register_form']))
{
  // START DEBUG STATEMENT
  // if ($password == $password_conf){
  //   if ($sql->execute() === TRUE) {
  //     echo "New record created successfully";
  //   }
  //   else {
  //     echo "Error: " . $sql . "<br>" . $conn->error;
  //   }
  //
  // }
  // else{
  //   echo "Passwords dont match";
  //   // exit();
  // }
  // END DEBUG STATEMENT

  $sql->execute();
  $sql->close();
  $conn->close();
}
?>

</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
    <img src="../images/ga-logo-white@2x.png" />
		<h1>Registration Confirmation</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
        <div class="row">
          <div class="col-md-12">Thank you for registering!</div>
        </div></br></br></br>
        <div class="row">
          <div class="col-md-12">A email confirmation will be sent to:</div>
        </div></br>
        <div class="row">
          <div class="col-md-12"><?php print $email ?></div>
        </div>
			</div>

    </div>
		</div>
    <?php include '../includes/footer.php'; ?>
	</div>
	<!-- //main -->
</body>
</html>
