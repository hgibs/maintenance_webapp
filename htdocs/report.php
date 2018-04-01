<?php

    $sql = "";
    $result = "";
    $error = "";
    $conn;
    
    session_start();
    
    if(empty($_SESSION)) {
      header("Location: manage.php");
      exit();
    }
    require("config.php");
    require("db_connect.php");
    
    $bumper = $_SESSION['urlname'] . '_bumper';
    $pmcs = $_SESSION['urlname'] . '_pmcs_record';
    
    
    
//     $sql = "SELECT `admin_numbers`.`tag`, `admin_numbers`.`previous`, pr1.`status`, pr1.`faults`, pr1.`batt`, pr1.`time_complete` ";
//     $sql .= "FROM `pmcs_record` pr1 ";
//     $sql .= "JOIN ( ";
// 	  $sql .= "SELECT `tag_id`, MAX(`time_complete`) as `time_c` ";
//         $sql .= "FROM `pmcs_record` ";
//         $sql .= "GROUP BY `tag_id`) AS pr2 ";
//         $sql .= "ON pr1.`tag_id` = pr2.`tag_id` AND pr1.`time_complete` = pr2.`time_c`";
//     $sql .= "RIGHT JOIN `admin_numbers` ON pr1.`tag_id` = `admin_numbers`.`id` ";
//     $sql .= "ORDER BY `tag` ASC ;";
        
    $sql = "SELECT `" . $bumper . "`.`tag`, pr1.`status`, pr1.`faults`, pr1.`time_complete` ";
    $sql .= "FROM `" . $pmcs . "` pr1 ";
    $sql .= "JOIN ( ";
	  $sql .= "SELECT `tag_id`, MAX(`time_complete`) as `time_c` ";
        $sql .= "FROM `" . $pmcs . "` ";
        $sql .= "GROUP BY `tag_id`) AS pr2 ";
        $sql .= "ON pr1.`tag_id` = pr2.`tag_id` AND pr1.`time_complete` = pr2.`time_c`";
    $sql .= "RIGHT JOIN `" . $bumper . "` ON pr1.`tag_id` = `" . $bumper . "`.`id` ";
    $sql .= "ORDER BY `tag` ASC ;";
    
    
    if (!($stmt = $conn->prepare($sql))) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }

    if (!$stmt->execute()) {
        die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
    }
    
    $result = $stmt->get_result();
//     $row = $res->fetch_assoc();
//     
//     $result = $conn->query($sql);
    $error = "";
//     $tags = array();


    //start writing the .csv
    header('Content-Type: application/excel');
    header('Content-Disposition: attachment; filename="report.csv"');

    if ($result->num_rows > 0) {
        echo "\"tag\",\"status\",\"faults\",\"time_completed\" \n ";
        while($row = $result->fetch_assoc()) {
    //         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            
            $tag = $row['tag'];
            $status = "FMC";
            if(strcmp($row['status'],"1")==0){
                $status = "NMC";
            }
            $faults = str_replace(',', ' ', $row['faults']);
            $faults = str_replace('\n',' ', $faults);
            
            $time = $row['time_complete'];
            
            echo "\"$tag\",\"$status\",\"$faults\",\"$time\"\n ";
        }
    } else {
            echo "0 results";
}

?>