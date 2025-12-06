<?php require __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-home"></i> Dashboard Học viên</h2>
            <p class="text-muted">Chào mừng bạn trở lại hệ thống khóa học online.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Tổng khóa học</h6>
                    <h3><?= isset($totalCourses) ? $totalCourses : 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h6>Đang học</h6>
                    <h3><?= isset($inProgressCourses) ? $inProgressCourses : 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <h6>Hoàn thành</h6>
                    <h3><?= isset($completedCourses) ? $completedCourses : 0 ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <i class="fas fa-book"></i> Khóa học của tôi
                    </h5>
                </div>
                <div class="card-body">
                    <?php if (empty($enrollments)): ?>
                        <p class="text-muted">Bạn chưa đăng ký khóa học nào. <a href="index.php?controller=Course&action=index">Khám phá khóa học</a></p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Khóa học</th>
                                        <th>Tiến độ</th>
                                        <th>Trạng thái</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach (array_slice($enrollments, 0, 5) as $enrollment): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($enrollment['title']) ?></td>
                                            <td>
                                                <div class="progress" style="height: 20px;">
                                                    <div class="progress-bar" style="width: <?= (int)($enrollment['progress'] ?? 0) ?>%">
                                                        <?= (int)($enrollment['progress'] ?? 0) ?>%
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-info"><?= htmlspecialchars($enrollment['status'] ?? 'active') ?></span></td>
                                            <td>
                                                <a href="index.php?controller=Student&action=courseProgress&courseId=<?= $enrollment['course_id'] ?>" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-play"></i> Học tiếp
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <a href="index.php?controller=Student&action=myCourses" class="btn btn-outline-primary">Xem tất cả khóa học</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
