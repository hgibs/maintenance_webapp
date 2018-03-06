<?php

    $sql = "";
    $result = "";
    $error = "";
    $conn;
    
    include "db_connect.php";
    
    header('Content-Type: application/excel');
    header('Content-Disposition: attachment; filename="report.csv"');
    
//     $sql = "SELECT `admin_numbers`.`tag`, pr1.`status`, pr1.`faults`, pr1.`batt`, pr1.`time_complete`\n"
//     . "FROM `pmcs_record` pr1 \n"
//     . "JOIN (\n"
//     . " SELECT `tag_id`, MAX(`time_complete`) as `time_c` \n"
//     . " FROM `pmcs_record`\n"
//     . " GROUP BY `tag_id`) AS pr2\n"
//     . " ON pr1.`tag_id` = pr2.`tag_id` AND pr1.`time_complete` = pr2.`time_c`;";
    
    $sql = "SELECT `admin_numbers`.`tag`, `admin_numbers`.`previous`, pr1.`status`, pr1.`faults`, pr1.`batt`, pr1.`time_complete` ";
    $sql .= "FROM `pmcs_record` pr1 ";
    $sql .= "JOIN ( ";
	  $sql .= "SELECT `tag_id`, MAX(`time_complete`) as `time_c` ";
        $sql .= "FROM `pmcs_record` ";
        $sql .= "GROUP BY `tag_id`) AS pr2 ";
        $sql .= "ON pr1.`tag_id` = pr2.`tag_id` AND pr1.`time_complete` = pr2.`time_c`";
    $sql .= "RIGHT JOIN `admin_numbers` ON pr1.`tag_id` = `admin_numbers`.`id` ";
    $sql .= "ORDER BY `tag` ASC ;";
    
    $result = $conn->query($sql);
    $error = "";
    $tags = array();

    if ($result->num_rows > 0) {
        echo "\"tag\",\"prev_tag\",\"status\",\"faults\",\"battery_unplugged\",\"time_completed\" \n ";
        while($row = $result->fetch_assoc()) {
    //         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
            
            $tag = $row['tag'];
            $previous = $row['previous'];
            $status = "FMC";
            if(strcmp($row['status'],"1")==0){
                $status = "NMC";
            }
            $faults = str_replace(',', ' ', $row['faults']);
            $faults = str_replace('\n',' ', $faults);
            
            $batt = "YES";
            if(strcmp($row['batt'],"1")==0){
                $batt = "NO";
            }
            
            $time = $row['time_complete'];
            
            echo "\"$tag\",\"$prev_tag\",\"$status\",\"$faults\",\"$batt\",\"$time\"\n ";
        }
    } else {
            echo "0 results";
}

?>