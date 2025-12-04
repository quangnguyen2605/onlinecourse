<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="course-progress">
    <h2><?= htmlspecialchars($course['title']) ?></h2>
    <p>Tiến độ hiện tại: <strong><?= (int)$enrollment['progress'] ?>%</strong></p>

    <h3>Danh sách bài học</h3>
    <ul>
        <?php foreach ($lessons as $lesson): ?>
            <li>
                <a href="index.php?controller=Lesson&action=view&id=<?= $lesson['id'] ?>">
                    <?= htmlspecialchars($lesson['title']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
