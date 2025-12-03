<?php
header("Content-Type: application/json");
include "../includes/db.php";

$sql = "SELECT * FROM menu_items WHERE active = 1";
$result = $conn->query($sql);

$menu = [];

while ($row = $result->fetch_assoc()) {
    $menu[] = $row;
}

echo json_encode([
    "status" => "success",
    "data" => $menu
]);
?>
