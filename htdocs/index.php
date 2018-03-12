<?php
  $debug = False;
  $sql = "";
  $result = "";
  $error = "";
  $tags;
  $conn;
  
  include "config.php";
  include "db_connect.php";
  
  $title = "SAMPLE TITLE";
  
  $unitname = $_GET['u'];
  
  include "pages/report-vars.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
        <title><?php echo $title; ?></title>

    <!-- Bootstrap core CSS -->
<!--     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="bootstrap/css/bootswatch.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="hh5.css" rel="stylesheet">
    
    <script src="jquery.min.js"></script>
    <?php include "pages/report-script.php"; ?>
    
  </head>

  <body>
  <?php 
//     print_r($_GET);
    include "pages/report-body.php"; 
  ?>
    
    
    
        
        <?php 
        if($debug){
            echo "<div>";
                echo "SQL: " . $sql;
                echo "<br><br>Result: " . $result;
                echo "<br><br>Error: " . $error;
                echo "<br><br>POST: ";
                print_r($_POST);
            echo "</div>";
        } ?>
        
        <!-- Start of StatCounter Code  -->
        <script type="text/javascript">
        var sc_project=11460767; 
        var sc_invisible=1; 
        var sc_security="f8ca141b"; 
        var scJsHost = (("https:" == document.location.protocol) ?
        "https://secure." : "http://www.");
        document.write("<sc"+"ript type='text/javascript' src='" +
        scJsHost+
        "statcounter.com/counter/counter.js'></"+"script>");
        </script>
        <noscript><div class="statcounter"><a title="Web Analytics"
        href="http://statcounter.com/" target="_blank"><img
        class="statcounter"
        src="//c.statcounter.com/11460767/0/f8ca141b/1/" alt="Web
        Analytics"></a></div></noscript>
        <!-- End of StatCounter Code -->
        
        
    </body>

</html>

<?php
    $conn->close(); 
?>