<?php
$conn = new mysqli("localhost", "root", "", "qr_order_system");
$conn->set_charset("utf8");

$sql = "SELECT * FROM orders ORDER BY id DESC";
$result = $conn->query($sql);

$data = [];

while ($row = $result->fetch_assoc()) {

    if ($row["status"] == "pending") $row["status_text"] = "⏳ Chờ xử lý";
    if ($row["status"] == "processing") $row["status_text"] = "🟡 Đang làm";
    if ($row["status"] == "done") $row["status_text"] = "✅ Hoàn thành";

    $data[] = $row;
}

echo json_encode($data);
?>
