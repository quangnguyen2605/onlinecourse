<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Tạo khóa học mới</h2>
<form method="post" action="index.php?controller=Course&action=store">
    <label>Tiêu đề</label>
    <input type="text" name="title" required>

    <label>Mô tả</label>
    <textarea name="description" rows="4"></textarea>

    <label>Danh mục</label>
    <select name="category_id">
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Giá</label>
    <input type="number" name="price" step="0.01" value="0">

    <label>Thời lượng (tuần)</label>
    <input type="number" name="duration_weeks" value="0">

    <label>Cấp độ</label>
    <select name="level">
        <option value="Beginner">Beginner</option>
        <option value="Intermediate">Intermediate</option>
        <option value="Advanced">Advanced</option>
    </select>

    <label>Ảnh (đường dẫn)</label>
    <input type="text" name="image">

    <button type="submit">Lưu</button>
</form>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
