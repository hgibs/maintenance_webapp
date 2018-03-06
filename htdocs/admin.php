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