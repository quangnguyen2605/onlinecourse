<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="instructor-my-courses">
    <h2>Khóa học của tôi</h2>
    <a class="btn" href="index.php?controller=Course&action=create">+ Tạo khóa học</a>
    <div class="course-list">
        <?php foreach ($courses as $c): ?>
            <div class="course-card">
                <h3><?= htmlspecialchars($c['title']) ?></h3>
                <p><?= nl2br(htmlspecialchars(substr($c['description'], 0, 100))) ?>...</p>
                <p>Thời lượng: <?= (int)$c['duration_weeks'] ?> tuần</p>
                <a class="btn" href="index.php?controller=Course&action=edit&id=<?= $c['id'] ?>">Sửa</a>
                <a class="btn" href="index.php?controller=Course&action=delete&id=<?= $c['id'] ?>" onclick="return confirm('Xóa khóa học này?');">Xóa</a>
                <a class="btn" href="index.php?controller=Lesson&action=manage&course_id=<?= $c['id'] ?>">Quản lý bài học</a>
                <a class="btn" href="index.php?controller=Course&action=students&course_id=<?= $c['id'] ?>">Học viên</a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
