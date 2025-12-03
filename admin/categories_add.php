<?php
require "../config.php";

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $conn->query("INSERT INTO categories (name) VALUES ('$name')");
    header("Location: categories.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Thêm danh mục</title>
</head>
<body>

<h2>Thêm danh mục</h2>

<form method="POST">
    <input type="text" name="name" placeholder="Tên danh mục" required>
    <button type="submit">Lưu</button>
</form>

</body>
</html>
