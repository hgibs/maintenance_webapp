<?php
// report variables
// $GLOBALS['title'] = "REPORT";


if (!($stmt = $conn->prepare("SELECT unit.name, unit.urlname FROM Unit WHERE unit.urlname = ?;"))) {
    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
}
//i int, s string, etc: http://php.net/manual/en/mysqli-stmt.bind-param.php
if (!$stmt->bind_param("s", $uniturlname)) {
    echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
}

if (!$stmt->execute()) {
    echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
}


$res = $stmt->get_result();
$row = $res->fetch_assoc();

$stmt->close();

$unitname = $row['name'];

$title = $unitname . " PMCS REPORT";
?>