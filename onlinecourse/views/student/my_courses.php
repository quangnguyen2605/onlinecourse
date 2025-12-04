<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="my-courses">
    <h2>Khóa học của tôi</h2>
    <div class="course-list">
        <?php foreach ($courses as $c): ?>
            <div class="course-card">
                <h3><?= htmlspecialchars($c['title']) ?></h3>
                <p>Trạng thái: <?= htmlspecialchars($c['status']) ?></p>
                <p>Tiến độ: <?= (int)$c['progress'] ?>%</p>
                <a class="btn" href="index.php?controller=Enrollment&action=progress&course_id=<?= $c['course_id'] ?>">Xem chi tiết tiến độ</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
