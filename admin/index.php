<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>QR ORDER - Dashboard</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<div class="admin-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2 class="logo">QR ORDER</h2>

        <nav>
            <a href="index.php" class="active">Dashboard</a>
            <a href="categories.php">Danh mục</a>
            <a href="menu_items.php">Món ăn</a>
            <a href="orders.php">Đơn hàng</a>
            <a href="#">Cài đặt</a>
        </nav>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <header class="topbar">
            <span>Xin chào, <b>Admin</b></span>
            <span class="date">
                <?= date('d/m/Y H:i') ?>
            </span>
        </header>

        <section class="dashboard-stats">

            <div class="card">
                <h3>Danh mục</h3>
                <p>Quản lý loại món</p>
            </div>

            <div class="card">
                <h3>Món ăn</h3>
                <p>Quản lý menu</p>
            </div>

            <div class="card">
                <h3>Đơn hàng</h3>
                <p>Nhận đơn từ khách</p>
            </div>

            <div class="card highlight">
                <h3>Hệ thống</h3>
                <p>QR Order đang hoạt động</p>
            </div>

        </section>

        <section class="welcome-box">
            <h2>QUẢN TRỊ QR ORDER</h2>
            <p>
                Đây là trang quản lý dành cho chủ quán:
            </p>

            <ul>
                <li>✔ Thêm – sửa – ẩn / hiện món</li>
                <li>✔ Quản lý danh mục</li>
                <li>✔ Theo dõi đơn khách theo bàn</li>
            </ul>

        </section>

    </main>

</div>

</body>
</html>
