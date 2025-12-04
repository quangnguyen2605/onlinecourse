<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Chỉnh sửa bài học</h2>
<form method="post" action="index.php?controller=Lesson&action=update">
    <input type="hidden" name="id" value="<?= $lesson['id'] ?>">
    <input type="hidden" name="course_id" value="<?= $lesson['course_id'] ?>">

    <label>Tiêu đề</label>
    <input type="text" name="title" value="<?= htmlspecialchars($lesson['title']) ?>" required>

    <label>Nội dung</label>
    <textarea name="content" rows="5"><?= htmlspecialchars($lesson['content']) ?></textarea>

    <label>Video URL</label>
    <input type="text" name="video_url" value="<?= htmlspecialchars($lesson['video_url']) ?>">

    <label>Thứ tự</label>
    <input type="number" name="order" value="<?= (int)$lesson['order'] ?>">

    <button type="submit">Cập nhật</button>
</form>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
