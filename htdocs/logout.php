<?php
  $debug = False;
  $sql = "";
  $result = "";
  $error = "";
  $tags;
  $conn;
  
  require("config.php");
  require("db_connect.php");
  
  //recapture session
  session_start();

  //not pretty, but it does the job

  // destroy the session
  session_destroy(); 


/********************************/
  include "template/head.php";
/********************************/

/********************************/
  include "template/start-body.php";
/********************************/

?>

<div class="container">
<h2>You have been logged out.</h2>
</div>

<?php
/********************************/
  include "template/footer.php";
/********************************/

?>