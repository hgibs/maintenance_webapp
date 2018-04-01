<?php
  $debug = False;
  $sql = "";
  $result = "";
  $error = "";
  $tags;
  $conn;
  
  require("config.php");
  require("db_connect.php");
  require("crypto_func.php");
  
  $title = "Unit Management";
  
//get current user from session variable or die

//get current unit from db
$unit = '';

/********************************/
  include "template/head.php";
/********************************/


/********************************/
  include "template/start-body.php";
/********************************/


/********************************/
include "template/footer.php";
/********************************/

?>