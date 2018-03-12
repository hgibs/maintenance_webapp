<?php
//connect db

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_err;
}
//connection successful

?>