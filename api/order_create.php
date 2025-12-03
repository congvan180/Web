<?php
header("Content-Type: application/json");
include "../includes/db.php";

$data = json_decode(file_get_contents("php://input"), true);

$table_id = $data["table_id"];
$items = $data["items"];
$total = $data["total"];

$conn->query("INSERT INTO orders (table_id, total) VALUES ($table_id, $total)");
$order_id = $conn->insert_id;

foreach ($items as $i) {
    $menu_id = $i["id"];
    $qty = $i["qty"];
    $price = $i["price"];
    $note = isset($i["note"]) ? $i["note"] : '';

    $conn->query("INSERT INTO order_items (order_id, menu_item_id, quantity, price, note)
        VALUES ($order_id, $menu_id, $qty, $price, '$note')");
}

echo json_encode([
    "status" => "success",
    "order_id" => $order_id
]);
?>
