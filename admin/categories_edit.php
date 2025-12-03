<?php
require "../config.php";
$id = $_GET['id'];

$sql = $conn->query("SELECT * FROM categories WHERE id=$id");
$cat = $sql->fetch_assoc();

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $conn->query("UPDATE categories SET name='$name' WHERE id=$id");
    header("Location: categories.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sửa danh mục</title>
</head>
<body>

<h2>Sửa danh mục</h2>

<form method="POST">
    <input type="text" name="name" value="<?= $cat['name'] ?>" required>
    <button type="submit">Lưu</button>
</form>

</body>
</html>
