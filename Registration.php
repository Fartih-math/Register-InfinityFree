<?php
header('Content-Type: application/json');

$servername = "sql101.infinityfree.com";
$username   = "if0_41615760";
$password   = "cOxybozOTCL";
$dbname     = "if0_41615760_dataku";

$conn = new mysqli($servername, $username, $password, $dbname);

/* CONNECTION FAIL */
if ($conn->connect_error) {
    echo json_encode([
        "error" => "DB connection failed",
        "details" => $conn->connect_error
    ]);
    exit;
}

date_default_timezone_set("Asia/Jakarta");

/* QUERY */
$sql = "SELECT id, firstname, lastname, email, avatar, reg_date 
        FROM MyTableIsGood ORDER BY id DESC";

$result = $conn->query($sql);

/* QUERY FAIL */
if (!$result) {
    echo json_encode([
        "error" => "Query failed",
        "details" => $conn->error
    ]);
    exit;
}

$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = [
        "id" => $row["id"],
        "name" => $row["firstname"] . " " . $row["lastname"],
        "description" => $row["email"],
        "last_modified" => $row["reg_date"]
            ? date("M d, Y", strtotime($row["reg_date"]))
            : "No date",
        "thumb" => $row["avatar"]
    ];
}

/* OUTPUT */
echo json_encode($data);

$conn->close();
?>