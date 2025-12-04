<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="student-dashboard">
    <h2>Dashboard học viên</h2>
    <p>Chào mừng bạn trở lại hệ thống khóa học online.</p>
    <ul>
        <li><a href="index.php?controller=Enrollment&action=myCourses">Khóa học đã đăng ký</a></li>
        <li><a href="index.php?controller=Course&action=index">Tất cả khóa học</a></li>
    </ul>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
