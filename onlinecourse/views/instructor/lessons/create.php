<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Thêm bài học</h2>
<form method="post" action="index.php?controller=Lesson&action=store">
    <input type="hidden" name="course_id" value="<?= (int)($_GET['course_id'] ?? 0) ?>">

    <label>Tiêu đề</label>
    <input type="text" name="title" required>

    <label>Nội dung</label>
    <textarea name="content" rows="5"></textarea>

    <label>Video URL</label>
    <input type="text" name="video_url">

    <label>Thứ tự</label>
    <input type="number" name="order" value="0">

    <button type="submit">Lưu</button>
</form>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
