<?php
// This is the configuration for the whole site

//local testing?
$debuglocal = True;

// DB variables
$servername = "";
$username = "";
$password = "";
$dbname = "";
$sqlport = 80;

// the passwords are held in a separate table for security purposes
$pwddbname = "";

if($debuglocal){
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "3187in_maint_backend";
  $sqlport = 8889;
}

$br = "<br />";

?>