<?php
header('Content-Type: application/json; charset=utf-8');
$conn = new mysqli("localhost","root","","qr_order_system");
$conn->set_charset("utf8");
$res = $conn->query("SELECT * FROM menu_items WHERE active=1");
$data = [];
while($r = $res->fetch_assoc()){
    $data[] = $r;
}
echo json_encode(['status'=>'success','data'=>$data]);
