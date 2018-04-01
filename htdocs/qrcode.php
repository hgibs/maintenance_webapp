<?php
//https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Example

session_start();
$debug = false;

if(empty($_SESSION)) {
  header("Location: manage.php");
  exit();
}

$address = "http://localhost:8888/?u=";
$txt = $address . $_SESSION['urlname'];
$link = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=" . $txt;
$title = "QR Code";
$username = $_SESSION['username'];

/********************************/
  include "template/head.php";
/********************************/


/********************************/
  include "template/start-navbar-body.php";
/********************************/

echo "<img src='" . $link . "'>";
echo "<br /><p>";
echo $txt;
echo "</p>";

/********************************/
include "template/footer.php";
/********************************/

//     $conn->close();

?>
