<?php require __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-list"></i> Khóa học của tôi</h2>
        </div>
    </div>

    <?php if (empty($enrollments)): ?>
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> Bạn chưa đăng ký khóa học nào. <a href="index.php?controller=Course&action=index">Đăng ký khóa học ngay</a>
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($enrollments as $enrollment): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        <?php if (!empty($enrollment['image'])): ?>
                            <img src="<?= htmlspecialchars($enrollment['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($enrollment['title']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-book" style="font-size: 48px; color: #ccc;"></i>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($enrollment['title']) ?></h5>
                            <p class="card-text text-muted small">Tiến độ: <?= (int)($enrollment['progress'] ?? 0) ?>%</p>
                            <div class="progress mb-3">
                                <div class="progress-bar" style="width: <?= (int)($enrollment['progress'] ?? 0) ?>%"></div>
                            </div>
                            <span class="badge bg-info"><?= htmlspecialchars($enrollment['status'] ?? 'active') ?></span>
                        </div>
                        <div class="card-footer bg-white">
                            <a href="index.php?controller=Student&action=courseProgress&courseId=<?= $enrollment['course_id'] ?>" class="btn btn-primary btn-sm w-100">
                                <i class="fas fa-play"></i> Tiếp tục học
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
