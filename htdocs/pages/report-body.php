<?php
// report body
?>

<div class="wrapper">
    
        <?php 
            
            
            include "submit.php"; 
        ?>

        <form class="form-horizontal" id="pmcsform" action="index.php" method="POST">
        <fieldset>

            <!-- Form Name -->
            <legend><?php echo $unitname;?> PMCS Report</legend>

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