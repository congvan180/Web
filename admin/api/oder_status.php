<?php
header('Content-Type: application/json; charset=utf-8');
$conn = new mysqli("localhost","root","","qr_order_system");
$conn->set_charset("utf8");
$id = intval($_GET['order_id'] ?? 0);
$res = $conn->query("SELECT status FROM orders WHERE id=$id");
if($res && $res->num_rows){
    $r = $res->fetch_assoc();
    echo json_encode(['status'=>'success','order_status'=>$r['status']]);
}else echo json_encode(['status'=>'error']);
