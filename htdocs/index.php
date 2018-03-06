<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    
        <title>Head Hunters PMCS Report</title>

    <!-- Bootstrap core CSS -->
<!--     <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="bootstrap/css/bootswatch.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="hh5.css" rel="stylesheet">
    
    <script src="jquery.min.js"></script>
    <script>
    $().ready(function() {
        var nmc = $("#fmc_radio-1");
        var fmc = $("#fmc_radio-0");
        var textarea = $("#textarea");
        
        nmc.click(function(){
            textarea.attr("disabled", false);
            textarea.attr("required", true);
        });
        
        fmc.click(function(){
            textarea.attr("disabled", true);
            textarea.attr("required", false);
        });
    });
    </script>
  </head>

  <body>
    
    
    <div class="wrapper">
    
        <?php 
            $debug = False;
            $sql = "";
            $result = "";
            $error = "";
            $tags;
            $conn;
            include "db_connect.php";
            include "submit.php"; 
        ?>

        <form class="form-horizontal" id="pmcsform" action="index.php" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend>Head Hunter PMCS Report</legend>

            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="tagselect">Vehicle bumper number</label>
              <div class="col-md-4">
                <select id="tagselect" name="tagselect" class="form-control" required>
                <option value='X' selected>Please select</option>
                  <?php
                        foreach($tags as $key => $value){
                            echo "<option value='" . $key . "'>" . $value . "</option>";
                        }
                    ?>
                </select>
              </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="fmc_radio">Vehicle Status</label>
              <div class="col-md-4">
              <div class="radio">
                <label for="fmc_radio-0">
                  <input name="fmc_radio" id="fmc_radio-0" value="FMC" type="radio" required>
                  FMC (Fully Mission Capable)
                </label>
                </div>
              <div class="radio">
                <label for="fmc_radio-1">
                  <input name="fmc_radio" id="fmc_radio-1" value="NMC" type="radio">
                  NMC (Not Mission Capable
                </label>
                </div>
              </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="textarea">List the deadlining faults:</label>
              <div class="col-md-4">                     
                <textarea class="form-control" id="textarea" name="textarea" value="Enter anything that has an 'X' fault code."></textarea>
              </div>
            </div>

            <!-- Multiple Radios -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="battery_check">Are the battery terminals unplugged?</label>
              <div class="col-md-4">
              <div class="radio">
                <label for="battery_check-0">
                  <input name="battery_check" id="battery_check-0" value="y" type="radio" required>
                  YES
                </label>
                </div>
              <div class="radio">
                <label for="battery_check-1">
                  <input name="battery_check" id="battery_check-1" value="n" type="radio">
                  NO
                </label>
                </div>
              </div>
            </div>

            <!-- Button -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="final_submit" required>Tap here after PMCS complete</label>
              <div class="col-md-4">
                <button id="final_submit" name="final_submit" class="btn btn-primary">PMCS Complete</button>
              </div>
            </div>

            </fieldset>
            </form>
            
            <br/>
            <br/>
            <!-- <a href="/report.php">Download report here</a> -->

        </div>
        
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