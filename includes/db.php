<?php
$host = "localhost";
$user = "root";   // tài khoản mặc định của XAMPP
$pass = "";       // mật khẩu mặc định rỗng
$dbname = "qr_order_system";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Kết nối database thất bại: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
