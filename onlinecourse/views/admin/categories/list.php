<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Danh mục khóa học</h2>
<a class="btn" href="index.php?controller=Admin&action=createCategory">+ Thêm danh mục</a>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Hành động</th>
    </tr>
    <?php foreach ($categories as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= htmlspecialchars($c['name']) ?></td>
            <td><?= htmlspecialchars($c['description']) ?></td>
            <td>
                <a href="index.php?controller=Admin&action=editCategory&id=<?= $c['id'] ?>">Sửa</a>
                | <a href="index.php?controller=Admin&action=deleteCategory&id=<?= $c['id'] ?>" onclick="return confirm('Xóa danh mục này?');">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
