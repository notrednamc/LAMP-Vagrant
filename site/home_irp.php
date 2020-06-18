<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Gray Analytics CAT</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../css/site.css" rel="stylesheet" type="text/css" media="all" >
    <link href="../css/event.css" rel="stylesheet" type="text/css" media="all" >
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <?php include '../includes/navigation.php' ?>

    <!-- main -->
  	<div class="main-w3layouts wrapper heading">
      <div class="heading">
        <h1 class="heading">Incident Response Submission</h1>
      </div>

  		<div class="main-agileinfo">
  			<div class="agileits-top">
          <div class="row">
            <div>
              <h2>What type of event are you having?</h2></br>
            </div>
            <form id="login-form" action="#" method="post" role="form" style="display: block;">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="chbxRW" value="real_world">
                <label class="form-check-label" for="chbxRW">Real World</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="chbxEX" value="exercise">
                <label class="form-check-label" for="chbxEX">Exercise</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="chbxOther" value="other">
                <label class="form-check-label" for="chbxOther">Other</label>
              </div>
              <div class="col-md-12" style="padding-top:10px;">
                <input class="text w3lpass" type="text" name="irp_user_fname" placeholder="First Name" required="">
                <input class="text w3lpass" type="text" name="irp_user_lname" placeholder="Last Name" required="">
      					<input class="text email" type="email" name="email" placeholder="Email" required="">

                <input class="text w3lpass" type="text" name="irp_poc_fname" placeholder="POC First Name" required="">
                <input class="text w3lpass" type="text" name="irp_poc_lname" placeholder="POC Last Name" required="">
      					<input class="text email" type="email" name="irp_poc_email" placeholder="POC Email" required="">
                <div class="col-md-12">
                  <h2>Describe the event.</h2></br>
                  <textarea class="text w2lpass form-control" name="irp_desc" required="" rows="3"></textarea>
                </div>
                <div class="col-md-12">
                  <h2>*Upon submission your event will be sent to the Gray Analytics team.</h2>
                </div>
              </div>
    					<input type="submit" value="SUBMIT">
				    </form>
  			</div>
  		</div>
  	</div>
    <?php include '../includes/footer.php'; ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>
