<?php
include "db.php";
include "header.php";
?>
<h2>📦 Danh sách đơn hàng</h2>

<div id="ordersList">Đang tải...</div>

<script>
function loadOrders(){
    fetch('../api/orders_admin.php')
    .then(res => res.json())
    .then(data => {
        let html = '';
        data.forEach(o=>{
            html += `<div class="order-box">
                <h4>Đơn #${o.id} - Bàn ${o.table_id} - ${o.total} đ</h4>
                <p>Trạng thái: ${o.status}</p>
                <button onclick="update(${o.id},'preparing')">Đang làm</button>
                <button onclick="update(${o.id},'served')">Hoàn thành</button>
            </div>`;
        });
        document.getElementById('ordersList').innerHTML = html;
    });
}
function update(id,status){
    fetch('../api/update_status.php', {
        method:'POST',
        body: JSON.stringify({id,status})
    }).then(()=>loadOrders());
}
loadOrders();
setInterval(loadOrders,5000);
</script>

<?php include "footer.php"; ?>
