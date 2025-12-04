<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Chỉnh sửa khóa học</h2>
<form method="post" action="index.php?controller=Course&action=update">
    <input type="hidden" name="id" value="<?= $course['id'] ?>">

    <label>Tiêu đề</label>
    <input type="text" name="title" value="<?= htmlspecialchars($course['title']) ?>" required>

    <label>Mô tả</label>
    <textarea name="description" rows="4"><?= htmlspecialchars($course['description']) ?></textarea>

    <label>Danh mục</label>
    <select name="category_id">
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat['id'] ?>" <?= $course['category_id'] == $cat['id'] ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Giá</label>
    <input type="number" name="price" step="0.01" value="<?= $course['price'] ?>">

    <label>Thời lượng (tuần)</label>
    <input type="number" name="duration_weeks" value="<?= $course['duration_weeks'] ?>">

    <label>Cấp độ</label>
    <select name="level">
        <option value="Beginner" <?= $course['level'] == 'Beginner' ? 'selected' : '' ?>>Beginner</option>
        <option value="Intermediate" <?= $course['level'] == 'Intermediate' ? 'selected' : '' ?>>Intermediate</option>
        <option value="Advanced" <?= $course['level'] == 'Advanced' ? 'selected' : '' ?>>Advanced</option>
    </select>

    <label>Ảnh (đường dẫn)</label>
    <input type="text" name="image" value="<?= htmlspecialchars($course['image']) ?>">

    <button type="submit">Cập nhật</button>
</form>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
