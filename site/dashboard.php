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
    <!-- <link href="../css/site.css" rel="stylesheet"> -->
    <link href="../css/dashboard.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
      include '../includes/db_conn.php';

      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      // $proc_get_dash_users = mysqli_query($conn, "CALL GET_DASH_USERS"); 
      // $proc_get_dash_open_tix = mysqli_query($conn, "CALL GET_DASH_OPEN_TICKETS");

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

        // $sql->execute();
        // $sql->close();
        // $conn->close();
      }
    ?>
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#">Project name</a> -->
          <img src="../images/ga-logo-white@2x.png" />
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid" style="padding-top:20px;">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Reports</a></li>
            <li><a href="#">Analytics</a></li>
            <li><a href="#">Export</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item</a></li>
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
            <li><a href="">More navigation</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="">Nav item again</a></li>
            <li><a href="">One more nav</a></li>
            <li><a href="">Another nav item</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/doc_icon.png" width="200" height="200" class="img-responsive dashdoc" alt="Generic dashdoc thumbnail">
              <h3>Incident Response Plan</h3>
              <span class="text-muted">Click to Download</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/doc_icon.png" width="200" height="200" class="img-responsive dashdoc" alt="Generic dashdoc thumbnail">
              <h3>Business Continuity</h3>
              <span class="text-muted">Click to Download</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/doc_icon.png" width="200" height="200" class="img-responsive dashdoc" alt="Generic dashdoc thumbnail">
              <h3>Disaster Recovery</h3>
              <span class="text-muted">Click to Download</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="../images/doc_icon.png" width="200" height="200" class="img-responsive dashdoc" alt="Generic dashdoc thumbnail">
              <h3>Other</h3>
              <span class="text-muted">Click to Download</span>
            </div>
          </div>

          <h2 class="sub-header">Users Table</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Password</th>
                  <th>Organization</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $proc_get_dash_users = mysqli_query($conn, "CALL GET_DASH_USERS");
                  while ($proc_get_dash_users_row = mysqli_fetch_array($proc_get_dash_users)){
                    echo "<tr class=\"table-row\" id=\"table-row\" data-href=\"#\">";
                    echo "<td>".$proc_get_dash_users_row[0]."</td>\n";
                    echo "<td>".$proc_get_dash_users_row[1]."</td>\n";
                    echo "<td>".$proc_get_dash_users_row[2]."</td>\n";
                    echo "<td>".$proc_get_dash_users_row[3]."</td>\n";
                    echo "<td>".$proc_get_dash_users_row[4]."</td>\n";
                    echo "<td>".$proc_get_dash_users_row[5]."</td>\n";
                    echo "<td>".$proc_get_dash_users_row[6]."</td>\n";
                    echo "</tr>";
                  }
                  mysqli_free_result($proc_get_dash_users);
                  mysqli_next_result($conn);

                ?>
              </tbody>
            </table>
          </div>

           

          <h2 class="sub-header">Open Event Tickets</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Class</th>
                  <th>Status</th>
                  <th>Severity</th>
                  <th>Category</th>
                </tr>
              </thead>
              <tbody>

               

                <?php
                  $proc_get_dash_tix = mysqli_query($conn, "SELECT * FROM tblTicket;");
                  while ($proc_get_dash_tix_row = mysqli_fetch_array($proc_get_dash_tix)){
                ?>
                <!-- <tr class="table-row" id="table-row" data-href="#"> -->
                  <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><?php echo $proc_get_dash_tix_row[6]; ?></a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse out">
                        <div class="panel-body">
                        <?php
                          echo $proc_get_dash_tix_row[7];
                        ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- </tr> -->
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>

          <h2 class="sub-header">Pending Event Tickets</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Class</th>
                  <th>Status</th>
                  <th>Category</th>
                  <th>Analyst</th>
                </tr>
              </thead>
              <tbody>
              <?php
                  $proc_get_dash_pend = mysqli_query($conn, "CALL GET_DASH_PENDING_TICKETS");
                  while ($proc_get_dash_pend_row = mysqli_fetch_array($proc_get_dash_pend)){
                    echo "<tr class=\"table-row\" id=\"table-row\" data-href=\"#\">";
                    echo "<td>".$proc_get_dash_pend_row[0]."</td>";
                    echo "<td>".$proc_get_dash_pend_row[1]."</td>";
                    echo "<td>".$proc_get_dash_pend_row[2]."</td>";
                    echo "<td>".$proc_get_dash_pend_row[3]."</td>";
                    echo "<td><a href=\"#\"><label class=\"label label-info\">".$proc_get_dash_pend_row[4]."</label></a></td>";
                    echo "</tr>";
                  }
                  mysqli_free_result($proc_get_dash_pend);
                  mysqli_next_result($conn);
              ?>
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    <?php mysqli_close($conn); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function($) {
          $("#table-row").click(function() {
              window.document.location = $(this).data("href");
          });
      });
    </script>
  </body>
</html>
