<?php
header("Content-Type: application/json");
include "../includes/db.php";

$sql = "
SELECT
    orders.id,
    orders.table_id,
    orders.total,
    orders.status,
    orders.created_at,
    tables.table_name
FROM orders
JOIN tables ON orders.table_id = tables.id
ORDER BY orders.id DESC
";

$result = $conn->query($sql);

$orders = [];

while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

echo json_encode([
    "status" => "success",
    "orders" => $orders
]);
?>
