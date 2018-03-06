<?php

//start server connection

$servername = "sql212.byethost12.com";
$username = "b12_20761278";
$password = "byethost123!@#";
$dbname = "b12_20761278_maintenance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 





$sql = "SELECT * FROM `admin_numbers` ORDER BY `tag` ASC";
$result = $conn->query($sql);
$error = "";
$tags = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
//         echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        $tags[$row["id"]] = $row["tag"];
    }
} else {
        $error .= "0 results";
}









?>