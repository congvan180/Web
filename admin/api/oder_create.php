<?php
header('Content-Type: application/json; charset=utf-8');
$conn = new mysqli("localhost","root","","qr_order_system");
$conn->set_charset("utf8");

$input = json_decode(file_get_contents('php://input'), true);
if(!$input){ echo json_encode(['status'=>'error','msg'=>'no input']); exit; }

$table_id = intval($input['table_id']);
$items = $input['items'];
$total = floatval($input['total']);

$conn->query("INSERT INTO orders (table_id,total,status) VALUES ($table_id,$total,'pending')");
$order_id = $conn->insert_id;

$stmt = $conn->prepare("INSERT INTO order_items (order_id, menu_item_id, quantity, price, note) VALUES (?,?,?,?,?)");
foreach($items as $it){
    $mid = intval($it['id']);
    $qty = intval($it['qty'] ?? 1);
    $price = floatval($it['price']);
    $note = isset($it['note']) ? $it['note'] : '';
    $stmt->bind_param("iiids",$order_id,$mid,$qty,$price,$note);
    $stmt->execute();
}
echo json_encode(['status'=>'success','order_id'=>$order_id]);
