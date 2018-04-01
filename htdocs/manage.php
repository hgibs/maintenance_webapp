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

//start or capture session
session_start();

$title = "Management Page";
  


$pagesrc = 0;
$errormsg = '';

//check if logging in via POST
if(array_key_exists('username',$_POST) && array_key_exists('passwordinput',$_POST)){
  //user is logging in
  $username = $_POST['username'];
  $password = $_POST['passwordinput'];
  
  //verify
  
  $pwdconn = new mysqli($servername, $dbusername, $dbpassword, $pwddbname);
  $login_result = login($username, $password, $pwdconn);
  if($login_result){
    $unitid = $login_result['unitid'];
    
    if (!($stmt = $conn->prepare("SELECT unit.name, unit.urlname FROM Unit WHERE unit.idUnit = ?;"))) {
      die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }
    //i int, s string, etc: http://php.net/manual/en/mysqli-stmt.bind-param.php
    if (!$stmt->bind_param("i", $unitid)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
    }

    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
    }
    $res = $stmt->get_result();
    $row = $res->fetch_assoc();

    $stmt->close();

    $_SESSION['unitname'] = $row['name'];

    $title = $row['name'] . " Management";
  
    $_SESSION['username'] = $username;
    $_SESSION['urlname'] = $row['urlname'];
  } else {
    $pagesrc = 0; //back to logging in
    $errormsg = "The information entered did not match our records";
  }
  
}

/********************************/
include "template/head.php";
/********************************/

//capture variables from session
if(array_key_exists('username',$_SESSION) && !empty($_SESSION)) {
  //session variables exist, so we are logged in
  $pagesrc=1;
}

if($pagesrc==0){
  //require log in


  // remove all session variables
  session_unset(); 
  
  //show log in
  include "template/start-body.php";
  
  if(strlen($errormsg>0)){
  ?>
    <div class='alert alert-danger'><p><?php echo $errormsg; ?></p></div>
  <?php
  }
  ?>
  
  <form class="form-horizontal" action="manage.php" method='POST'>
    <fieldset>

    <!-- Form Name -->
    <legend>Please log in to access this page</legend>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="username">Username</label>  
      <div class="col-md-4">
      <input id="username" name="username" placeholder="" class="form-control input-md" required="" type="text">
      <span class="help-block">not your email</span>  
      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="passwordinput">Password</label>
      <div class="col-md-4">
        <input id="passwordinput" name="passwordinput" placeholder="" class="form-control input-md" required="" type="password">
    
      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="submitlogin"></label>
      <div class="col-md-4">
        <button id="submitlogin" name="submitlogin" class="btn btn-primary">Submit</button>
      </div>
    </div>

    </fieldset>
  </form>

  
  
  <?php
  
  include "template/footer.php";
} else {

$username = $_SESSION['username'];

/********************************/
  include "template/start-navbar-body.php";
/********************************/
?>

<p>Things to add: add/remove/change bumper number, change password, add/remove user</p>

<?php
/********************************/
  include "template/footer.php";
/********************************/
$conn->close();
}

/*

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
        <title>Head Hunters PMCS Admin Page</title>

    <!-- Bootstrap core CSS -->
<!--     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="bootstrap/css/bootswatch.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="hh5.css" rel="stylesheet">
  </head>

  <body>
    
    
    <div class="wrapper">
    
    <a href="/report.php">Download report here</a>
    <?php 
        $debug = False;
        $sql = "";
        $result = "";
        $error = "";
        $tags;
        $conn;
        include "db_connect.php";
        
        //submit form to db
        if(isset($_POST["addbutton"])){
          $tag = $_POST["taginput"];
          $stmt = $conn->prepare("INSERT INTO `admin_numbers` (tag) VALUES (?)");
        
          $error = "";
        
          $stmt->bind_param("s", $tag);

          if ($stmt->execute()) {
              echo "<div class='message'>Successfully added record to database.</div>";
          } else {
              $error .= "Failed execution!";
              echo "<div class='message'> $error </div>";
          }
        }
    ?>
    
    <form class="form-horizontal" method="POST">
      <fieldset>

      <!-- Form Name -->
      <legend>Add Tag</legend>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="taginput">Bumper Number</label>  
        <div class="col-md-4">
        <input id="taginput" name="taginput" placeholder="HQ-99" class="form-control input-md" type="text">
        </div>
      </div>

      <!-- Button -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="addbutton"></label>
        <div class="col-md-4">
          <button id="addbutton" name="addbutton" class="btn btn-primary">Add Tag</button>
        </div>
      </div>

      </fieldset>
    </form>

        
    </div>
  </body>
  
</html>
<?php
*/
?>