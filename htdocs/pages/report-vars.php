<?php
// report variables
// $GLOBALS['title'] = "REPORT";
$title = $unitname . " PMCS REPORT";

if (!($stmt = $conn->prepare("SELECT unit.name, unit.urlname FROM Unit"))) {
    echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
}
?>