<?php
include "db.php";

// fetch categories for select
$cats_res = $conn->query("SELECT * FROM categories WHERE active=1");

// Handle add
if(isset($_POST['add'])){
    $name = $conn->real_escape_string($_POST['name']);
    $cat = intval($_POST['category_id']);
    $price = floatval($_POST['price']);
    $desc = $conn->real_escape_string($_POST['description']);
    $imagePath = '';

    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $fname = time().'_'.rand(1000,9999).'.'.$ext;
        $dest = __DIR__ . '/uploads/' . $fname;
        if(!is_dir(__DIR__ . '/uploads')) mkdir(__DIR__ . '/uploads', 0755, true);
        move_uploaded_file($_FILES['image']['tmp_name'], $dest);
        $imagePath = 'admin/uploads/' . $fname;
    }

    $conn->query("INSERT INTO menu_items (category_id,name,description,price,image) VALUES ($cat,'$name','$desc',$price,'$imagePath')");
    header("Location: menu_items.php");
    exit;
}

include "header.php";
?>

<h2>🍽 Quản lý món ăn</h2>

<!-- Add form -->
<form method="post" enctype="multipart/form-data" class="add-form">
    <input type="text" name="name" placeholder="Tên món" required>
    <select name="category_id" required>
        <option value="">-- Chọn danh mục --</option>
        <?php while($c = $cats_res->fetch_assoc()): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
        <?php endwhile; ?>
    </select>
    <input type="number" name="price" placeholder="Giá (đ)" required>
    <textarea name="description" placeholder="Mô tả"></textarea>
    <input type="file" name="image" accept="image/*">
    <button type="submit" name="add">Thêm món</button>
</form>

<!-- List -->
<table class="admin-table">
<thead><tr><th>ID</th><th>Ảnh</th><th>Tên</th><th>Danh mục</th><th>Giá</th><th>Trạng thái</th></tr></thead>
<tbody>
<?php
$res2 = $conn->query("SELECT m.*, c.name AS catname FROM menu_items m LEFT JOIN categories c ON m.category_id=c.id ORDER BY m.id DESC");
while($r = $res2->fetch_assoc()):
?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?php if($r['image']) echo "<img src='../{$r['image']}' style='width:80px;height:60px;object-fit:cover;'>"; ?></td>
    <td><?= htmlspecialchars($r['name']) ?></td>
    <td><?= htmlspecialchars($r['catname']) ?></td>
    <td><?= number_format($r['price'],0,',','.') ?></td>
    <td><?= $r['active'] ? 'Đang bán' : 'Ẩn' ?></td>
</tr>
<?php endwhile; ?>
</tbody>
</table>

<?php include "footer.php"; ?>
