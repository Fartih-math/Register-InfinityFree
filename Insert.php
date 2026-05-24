<?php
$servername = "sql101.infinityfree.com";
$username   = "if0_41615760";
$password   = "cOxybozOTCL";
$dbname     = "if0_41615760_dataku";

/* CONNECT */
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    header("Location: index.php?error=1");
    exit;
}

/* FORCE TIMEZONE (PHP ONLY) */
date_default_timezone_set("Asia/Jakarta");

/* CREATE TABLE (only once, safe) */
$conn->query("CREATE TABLE IF NOT EXISTS MyTableIsGood (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    email VARCHAR(100),
    avatar VARCHAR(255),
    reg_date DATETIME
)");

/* GET FORM DATA */
$firstname = $_POST["firstname"];
$lastname  = $_POST["lastname"];
$email     = $_POST["email"];

/* RANDOM AVATAR */
$avatars = [
    "avatars/avatar1.png",
    "avatars/avatar2.png",
    "avatars/avatar3.png",
    "avatars/avatar4.png",
    "avatars/avatar5.png",
    "avatars/avatar6.png",
    "avatars/avatar7.png",
    "avatars/avatar8.png",
    "avatars/avatar9.png",
    "avatars/avatar10.png",
    "avatars/avatar11.png"
];

$randomAvatar = $avatars[array_rand($avatars)];

/* FORCE CORRECT TIME (NO SERVER DEPENDENCY) */
$currentTime = gmdate("Y-m-d H:i:s", time() + (7 * 3600));

/* INSERT */
$sql = "INSERT INTO MyTableIsGood 
(firstname, lastname, email, avatar, reg_date)
VALUES 
('$firstname', '$lastname', '$email', '$randomAvatar', '$currentTime')";

if ($conn->query($sql)) {
    header("Location: index.php?msg=1");
} else {
    header("Location: index.php?error=1");
}

$conn->close();
exit;
?>