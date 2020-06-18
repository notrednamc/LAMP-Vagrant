<?php
/*
** Purposes of this file:
** 1) Database connection
** 2) Start session
** 3) Closing connection is done in the footer
*/
$dbhost = "localhost";
$dbuser = "user_cat";
$dbpass = "password";
$db = "db_cat";

$conn= new mysqli($dbhost,$dbuser,$dbpass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// DEBUG STATEMENT
// echo "Connected successfully";

// mysqli_select_db($conn,$db);
//To select the database

session_start(); //To start the session




// // Example of using a stored procedure.
// // enable error reporting
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// //connect to database
// $connection = mysqli_connect("hostname", "user", "password", "db", "port");
//
// //run the store proc
// $result = mysqli_query($connection, "CALL StoreProcName");
//
// //loop the result set
// while ($row = mysqli_fetch_array($result)){
//   echo $row[0] . " - " . + $row[1];
// }
?>
