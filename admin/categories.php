<?php
include "db.php";

// Thêm
if (isset($_POST['add'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $conn->query("INSERT INTO categories (name) VALUES ('$name')");
    header("Location: categories.php");
    exit;
}

// Sửa
if (isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $name = $conn->real_escape_string($_POST['name']);
    $conn->query("UPDATE categories SET name='$name' WHERE id=$id");
    header("Location: categories.php");
    exit;
}

// Xóa hoặc toggle (toggle implementation)
if (isset($_GET['toggle'])) {
    $id = intval($_GET['toggle']);
    $res = $conn->query("SELECT active FROM categories WHERE id=$id");
    $r = $res->fetch_assoc();
    $new = $r['active'] ? 0 : 1;
    $conn->query("UPDATE categories SET active=$new WHERE id=$id");
    header("Location: categories.php");
    exit;
}

include "header.php";
?>
<link rel="stylesheet" href="css/categories.css">

<h2>📂 Quản lý danh mục</h2>

<!-- Form thêm -->
<form class="add-form" method="post">
    <input type="text" name="name" placeholder="Tên danh mục..." required>
    <button type="submit" name="add">Thêm</button>
</form>

<!-- Table -->
<table class="admin-table">
<thead>
<tr><th>ID</th><th>Tên</th><th>Trạng thái</th><th>Hành động</th></tr>
</thead>
<tbody>
<?php
$res = $conn->query("SELECT * FROM categories ORDER BY id DESC");
while ($row = $res->fetch_assoc()):
?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['name']) ?></td>
    <td><?= $row['active'] ? '<span class="on">Đang dùng</span>' : '<span class="off">Ẩn</span>' ?></td>
    <td>
        <a class="btn-edit" href="#edit-<?= $row['id'] ?>" onclick="openEdit(<?= $row['id'] ?>,'<?= addslashes($row['name']) ?>')">Sửa</a>
        <a class="btn-toggle" href="?toggle=<?= $row['id'] ?>"><?= $row['active'] ? 'Ẩn' : 'Hiện' ?></a>
    </td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

<!-- Edit modal (simple) -->
<div id="editModal" class="modal" style="display:none;">
    <div class="modal-content">
        <h3>Sửa danh mục</h3>
        <form method="post">
            <input type="hidden" name="id" id="edit_id">
            <input type="text" name="name" id="edit_name" required>
            <button type="submit" name="edit">Lưu</button>
            <button type="button" onclick="closeEdit()">Hủy</button>
        </form>
    </div>
</div>

<script>
function openEdit(id,name){
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('editModal').style.display = 'block';
}
function closeEdit(){
    document.getElementById('editModal').style.display = 'none';
}
</script>

<?php include "footer.php"; ?>
