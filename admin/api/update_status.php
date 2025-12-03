<?php
$conn = new mysqli("localhost", "root", "", "qr_order_system");
$conn->set_charset("utf8");

$postData = json_decode(file_get_contents("php://input"), true);

$id = $postData["id"];
$status = $postData["status"];

$sql = "UPDATE orders SET status='$status' WHERE id=$id";
$conn->query($sql);

echo json_encode(["status" => "success"]);
?>
