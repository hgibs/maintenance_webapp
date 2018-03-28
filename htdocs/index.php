<?php
  $debug = False;
  $sql = "";
  $result = "";
  $error = "";
  $tags;
  $conn;
  
  require("config.php");
  require("db_connect.php");
  
  $title = "SAMPLE TITLE";
  
  //1=choose company
  //2=report
  
  $pagesrc = 1;
  
  if(isset($_GET['u'])){
    
    $uniturlname = $_GET['u'];
    $pagesrc = 2;
  }
  
  if($pagesrc == 1){
    $title = "Bad Link!";
  
  } elseif($pagesrc == 2){
    include "pages/report-vars.php";
    if(strlen($unitname)<=1){
      //redirect on no match
      $pagesrc = 1;
    }
  }
  
/********************************/
  include "template/head.php";
/********************************/
  
  if($pagesrc == 1){
  
  
  } elseif($pagesrc == 2){
    include "pages/report-script.php";
  }
    
/********************************/
  include "template/head.php";
/********************************/

//     print_r($_GET);

  if($pagesrc == 1){
    include "pages/badunit-body.php";
  } elseif($pagesrc == 2){
    include "pages/report-body.php";
  }
  
  
/********************************/
include "template/footer.php";
/********************************/

    $conn->close(); 
?>