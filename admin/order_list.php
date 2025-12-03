<?php
// Kết nối DB
$conn = new mysqli("localhost", "root", "", "qr_order_system");
$conn->set_charset("utf8");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý đơn hàng</title>
<style>
    body { font-family: Arial; padding: 20px; }
    .order-box {
        border: 1px solid #ddd;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 8px;
    }
    .btn { padding: 6px 12px; margin-right: 6px; cursor: pointer; }
    .btn-yellow { background: orange; color: white; }
    .btn-blue { background: #007bff; color: white; }
    .btn-green { background: green; color: white; }
</style>
</head>
<body>

<h2>📦 Danh sách đơn hàng</h2>

<div id="order_list">Đang tải...</div>

<script>
function loadOrders() {
    fetch("api/orders.php")
        .then(res => res.json())
        .then(data => {

            let html = "";
            data.forEach(order => {
                html += `
                <div class="order-box">
                    <h3>Đơn #${order.id} - Bàn ${order.table_id}</h3>
                    <p><b>Tổng tiền:</b> ${order.total} đ</p>
                    <p><b>Trạng thái:</b> ${order.status_text}</p>

                    <button class="btn btn-blue" onclick="updateStatus(${order.id}, 'processing')">Đang làm</button>
                    <button class="btn btn-green" onclick="updateStatus(${order.id}, 'done')">Hoàn thành</button>
                </div>`;
            });

            document.getElementById("order_list").innerHTML = html;
        });
}

function updateStatus(id, status) {
    fetch("api/update_status.php", {
        method: "POST",
        body: JSON.stringify({ id, status })
    })
    .then(res => res.json())
    .then(() => loadOrders());
}

loadOrders();
setInterval(loadOrders, 5000); // refresh mỗi 5s
</script>

</body>
</html>
