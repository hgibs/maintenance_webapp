<?php
// This is the configuration for the whole site

//local testing?
$debuglocal = True;

// DB variables
$servername = "localhost";
$dbusername = "root";
$dbpassword = "root";
$dbname = "3187in_maint_backend";
$sqlport = 8889;
// $sqlport = 80;

// the passwords are held in a separate table for security purposes
$pwddbname = "3187in_secure_use";

$br = "<br />";

require("config-check.php");
?>