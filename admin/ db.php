<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "qr_order_system";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connect error: " . $conn->connect_error);
}
$conn->set_charset("utf8");
?>
