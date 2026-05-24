<?php
$servername = "sql101.infinityfree.com";
$username   = "if0_41615760";
$password   = "cOxybozOTCL";
$dbname     = "if0_41615760_dataku";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header("Location: Table.php?error=1");
    exit;
}

$id        = $_POST["id"];
$firstname = $_POST["firstname"];
$lastname  = $_POST["lastname"];
$email     = $_POST["email"];

$sql = "UPDATE MyTableIsGood 
        SET firstname='$firstname', lastname='$lastname', email='$email'
        WHERE id='$id'";

if ($conn->query($sql)) {
    header("Location: Table.php?msg=2");
    exit;;
} else {
    header("Location: Table.php?error=1");
}

$conn->close();
exit;
?>