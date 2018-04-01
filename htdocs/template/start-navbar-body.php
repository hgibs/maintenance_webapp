<?php
// start the wrapper and add navbar
if(!isset($username)){
  $username = 'NO USERNAME!';
}
?>

<div class="wrapper">
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <span class="navbar-brand">Welcome <?php echo $username; ?></span>
      </div>
      <ul class="nav navbar-nav">
        <?php /*
        <li class="active"><a href="#">Home</a></li>
              */ ?>
        <li><a href="manage.php">Management</a></li>
        <li><a href="report.php">Download Report</a></li>
        <li><a href="qrcode.php">QR Code</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">Log out</a></li>
      </ul>
    </div>
  </nav>