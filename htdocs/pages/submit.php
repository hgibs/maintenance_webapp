<?php

//submit form to db
if(isset($_POST["final_submit"])){
//     print_r($_POST);

    $tag = $_POST["tagselect"];
    
    if(strcmp($tag,"X")!==0){
    
        $status = 0;
        if(strcmp($_POST["fmc_radio"],"NMC") == 0){
            //TRUCK IS NMC
            $status = 1;
        }
    
        $faults = $_POST["textarea"];
    
        $batt = 0;
        if(strcmp($_POST["battery_check"],"n") == 0){
            //batt unplugged
            $batt = 1;
        }
        

        $sql = "INSERT INTO `pmcs_record` (tag_id, status, faults, batt) VALUES ";
        $sql .= "('{$tag}','{$status}','{$faults}','{$batt}');";
        
        $stmt = $conn->prepare("INSERT INTO `pmcs_record` (tag_id, status, faults, batt) VALUES (?,?,?,?)");
        
        $error = "";
        
        $stmt->bind_param("sisi", $tag, $status, $faults, $batt);

        if ($stmt->execute()) {
            echo "<div class='message'>Successfully added record to database.</div>";
        } else {
            $error .= "Failed execution!";
            echo "<div class='message'> $error </div>";
        }
        
        
        /* explicit close recommended */
        $stmt->close();
    } else {
        echo "<div class='message'> Please select a valid bumper number! <br /></div>";
    }
}

?>