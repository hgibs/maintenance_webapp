<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
        <title>Site Installation / Creation</title>

    <!-- Bootstrap core CSS -->
<!--     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="bootstrap/css/bootswatch.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="hh5.css" rel="stylesheet">
    
    <script src="jquery.min.js"></script>
  </head>
  <body><p>
<?php
  //check if tables exist
  //this happens after config.php is completed
  require("config.php");
  
  // Create connection
  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
  $connpwd = new mysqli($servername, $dbusername, $dbpassword, $pwddbname);

  if ($conn->connect_errno) {
      echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_err . $br;
  }
  
  if ($connpwd->connect_errno) {
      echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_err . $br;
  }
  
  if (!($stmt = $conn->prepare("SELECT unit.name, unit.urlname FROM Unit WHERE unit.urlname = ?;"))) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
  }
  //i int, s string, etc: http://php.net/manual/en/mysqli-stmt.bind-param.php
  if (!$stmt->bind_param("s", $uniturlname)) {
      echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
  }

  if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
  }


  $res = $stmt->get_result();
  $row = $res->fetch_assoc();

  $stmt->close();

  $unitname = $row['name'];

  $title = $unitname . " PMCS REPORT";
?>
  </p></body></html>