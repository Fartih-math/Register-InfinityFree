<?php
$servername = "sql101.infinityfree.com";
$username   = "if0_41615760";
$password   = "cOxybozOTCL";
$dbname     = "if0_41615760_dataku";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "error";
    exit;
}

$id = $_GET["id"];

$sql = "DELETE FROM MyTableIsGood WHERE id=$id";

if ($conn->query($sql)) {
    echo "success";
} else {
    echo "error";
}

$conn->close();
exit;
?>