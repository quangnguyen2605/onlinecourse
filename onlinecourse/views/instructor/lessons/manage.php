<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Quản lý bài học - <?= htmlspecialchars($course['title']) ?></h2>
<a class="btn" href="index.php?controller=Lesson&action=create&course_id=<?= $course['id'] ?>">+ Thêm bài học</a>
<ul>
    <?php foreach ($lessons as $lesson): ?>
        <li>
            <?= htmlspecialchars($lesson['title']) ?>
            (<a href="index.php?controller=Lesson&action=edit&id=<?= $lesson['id'] ?>">Sửa</a>
            | <a href="index.php?controller=Lesson&action=delete&id=<?= $lesson['id'] ?>&course_id=<?= $course['id'] ?>" onclick="return confirm('Xóa bài học?');">Xóa</a>
            | <a href="index.php?controller=Lesson&action=uploadMaterial&lesson_id=<?= $lesson['id'] ?>">Tài liệu</a>)
        </li>
    <?php endforeach; ?>
</ul>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
