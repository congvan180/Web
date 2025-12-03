<?php
require "../config.php";

$sql = "SELECT * FROM categories ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý danh mục</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<h2>Quản lý danh mục món</h2>

<a href="categories_add.php" class="btn">+ Thêm danh mục</a>

<table>
    <tr>
        <th>ID</th>
        <th>Tên danh mục</th>
        <th>Hành động</th>
    </tr>
    <?php while($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td>
            <a href="categories_edit.php?id=<?= $row['id'] ?>" class="edit">Sửa</a>
            <a href="categories_delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Xóa danh mục này?')">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>
