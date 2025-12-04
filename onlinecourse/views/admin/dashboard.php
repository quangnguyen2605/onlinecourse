<?php require __DIR__ . '/../layouts/header.php'; ?>
<h2>Admin Dashboard</h2>
<ul>
    <li>Tổng số người dùng: <?= (int)$totalUsers ?></li>
    <li>Tổng số khóa học: <?= (int)$totalCourses ?></li>
    <li>Tổng số lượt đăng ký: <?= (int)$totalEnrollments ?></li>
</ul>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
