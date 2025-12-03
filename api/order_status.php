<?php
header("Content-Type: application/json");
include "../includes/db.php";

$order_id = $_GET["order_id"];

$sql = "SELECT status FROM orders WHERE id = $order_id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo json_encode(["status" => "error"]);
    exit;
}

$data = $result->fetch_assoc();

echo json_encode([
    "status" => "success",
    "order_status" => $data["status"]
]);
?>
