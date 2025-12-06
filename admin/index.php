<?php
include "db.php";

// Lấy số lượng danh mục
$cat_res = $conn->query("SELECT COUNT(*) AS total_categories FROM categories");
$cat_data = $cat_res->fetch_assoc();
$total_categories = $cat_data['total_categories'];

// Lấy số lượng món ăn
$menu_res = $conn->query("SELECT COUNT(*) AS total_menu FROM menu_items");
$menu_data = $menu_res->fetch_assoc();
$total_menu = $menu_data['total_menu'];

// Lấy tổng đơn hàng và doanh thu
$order_res = $conn->query("SELECT COUNT(*) AS total_orders, IFNULL(SUM(total),0) AS revenue FROM orders");
$order_data = $order_res->fetch_assoc();
$total_orders = $order_data['total_orders'];
$revenue = $order_data['revenue'];

// Lấy dữ liệu doanh thu theo ngày (7 ngày gần nhất)
$sales_res = $conn->query("
    SELECT DATE(created_at) AS order_date, IFNULL(SUM(total),0) AS daily_revenue
    FROM orders
    WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)
    GROUP BY DATE(created_at)
    ORDER BY order_date ASC
");

$chart_labels = [];
$chart_data = [];
while($row = $sales_res->fetch_assoc()){
    $chart_labels[] = $row['order_date'];
    $chart_data[] = $row['daily_revenue'];
}

include "header.php";
?>
<link rel="stylesheet" href="css/index.css">
<h2>📊 Dashboard QR ORDER</h2>

<div class="dashboard-cards">

    <div class="card">
        <h3>Danh mục</h3>
        <p>Số danh mục: <b><?= $total_categories ?></b></p>
    </div>

    <div class="card">
        <h3>Món ăn</h3>
        <p>Số món: <b><?= $total_menu ?></b></p>
    </div>

    <div class="card">
        <h3>Đơn hàng</h3>
        <p>Tổng đơn: <b><?= $total_orders ?></b></p>
        <p>Doanh thu: <b><?= number_format($revenue,0,',','.') ?> đ</b></p>
    </div>

    <div class="card highlight">
        <h3>Hệ thống</h3>
        <p>QR Order đang hoạt động</p>
    </div>

</div>

<!-- Biểu đồ doanh thu -->
<div class="chart-container">
    <canvas id="revenueChart"></canvas>
</div>

<section class="welcome-box">
    <h2>QUẢN TRỊ QR ORDER</h2>
    <p>Trang quản lý dành cho chủ quán:</p>
    <ul>
        <li>✔ Thêm – sửa – ẩn / hiện món</li>
        <li>✔ Quản lý danh mục</li>
        <li>✔ Theo dõi đơn khách theo bàn</li>
        <li>✔ Xem tổng doanh thu và số đơn</li>
    </ul>
</section>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('revenueChart').getContext('2d');
const revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?= json_encode($chart_labels) ?>,
        datasets: [{
            label: 'Doanh thu (VNĐ)',
            data: <?= json_encode($chart_data) ?>,
            backgroundColor: 'rgba(102, 126, 234, 0.2)',
            borderColor: 'rgba(102, 126, 234, 1)',
            borderWidth: 2,
            tension: 0.3,
            fill: true,
            pointRadius: 5,
            pointBackgroundColor: 'rgba(102, 126, 234, 1)'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return value.toLocaleString('vi-VN') + " đ";
                    }
                }
            }
        }
    }
});
</script>

<?php include "footer.php"; ?>
