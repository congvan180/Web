<?php
// header.php (include at top of admin pages)
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>QR ORDER - Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div class="admin-wrapper">
    <aside class="sidebar">
        <h2 class="logo">QR ORDER</h2>
        <nav>
            <a href="index.php" class="<?= (basename($_SERVER['PHP_SELF'])=='index.php')?'active':'' ?>">Dashboard</a>
            <a href="categories.php" class="<?= (basename($_SERVER['PHP_SELF'])=='categories.php')?'active':'' ?>">Danh mục</a>
            <a href="menu_items.php" class="<?= (basename($_SERVER['PHP_SELF'])=='menu_items.php')?'active':'' ?>">Món ăn</a>
            <a href="orders.php" class="<?= (basename($_SERVER['PHP_SELF'])=='orders.php')?'active':'' ?>">Đơn hàng</a>
            <a href="#">Cài đặt</a>
        </nav>
    </aside>
    <main class="main">
        <header class="topbar">
            <span>Xin chào, <b>Admin</b></span>
            <span class="date"><?= date('d/m/Y H:i') ?></span>
        </header>
