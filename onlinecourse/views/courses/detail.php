<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <h2><?= htmlspecialchars($course['title']) ?></h2>
            
            <div class="mb-4">
                <p class="text-muted">Giảng viên: <strong><?= htmlspecialchars($instructor['fullname'] ?? 'N/A') ?></strong></p>
                <span class="badge bg-info"><?= htmlspecialchars($course['level']) ?></span>
                <span class="badge bg-warning">Thời lượng: <?= (int)$course['duration_weeks'] ?> tuần</span>
            </div>

            <div class="mb-4">
                <h5>Mô tả khóa học</h5>
                <p><?= nl2br(htmlspecialchars($course['description'])) ?></p>
            </div>

            <div class="mb-4">
                <h5>Nội dung bài học</h5>
                <div class="list-group">
                    <?php if (!empty($lessons)): ?>
                        <?php foreach ($lessons as $lesson): ?>
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h6 class="mb-1"><?= htmlspecialchars($lesson['title']) ?></h6>
                                        <p class="mb-0 text-muted small"><?= htmlspecialchars(substr($lesson['content'], 0, 100)) ?>...</p>
                                    </div>
                                    <?php if ($isEnrolled): ?>
                                        <a href="index.php?controller=Student&action=lessonView&lessonId=<?= $lesson['id'] ?>" class="btn btn-sm btn-primary">
                                            Xem
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted">Chưa có bài học nào</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4 class="mb-3">
                        <?= number_format($course['price'], 0, ',', '.') ?> <small class="text-muted">VND</small>
                    </h4>
                    
                    <?php if ($isEnrolled): ?>
                        <div class="alert alert-success">
                            <i class="fas fa-check-circle"></i> Bạn đã đăng ký khóa học này
                        </div>
                        <a href="index.php?controller=Student&action=courseProgress&courseId=<?= $course['id'] ?>" class="btn btn-primary w-100">
                            <i class="fas fa-play"></i> Tiếp tục học
                        </a>
                    <?php else: ?>
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form method="POST" action="index.php?controller=Course&action=enroll">
                                <input type="hidden" name="courseId" value="<?= $course['id'] ?>">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-shopping-cart"></i> Đăng ký ngay
                                </button>
                            </form>
                        <?php else: ?>
                            <a href="index.php?controller=Auth&action=login" class="btn btn-primary w-100">
                                Đăng nhập để đăng ký
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h6>Thông tin khóa học</h6>
                    <ul class="list-unstyled small">
                        <li class="mb-2"><i class="fas fa-book"></i> Bài học: <?= count($lessons ?? []) ?></li>
                        <li class="mb-2"><i class="fas fa-clock"></i> Thời lượng: <?= (int)$course['duration_weeks'] ?> tuần</li>
                        <li class="mb-2"><i class="fas fa-graduation-cap"></i> Cấp độ: <?= htmlspecialchars($course['level']) ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
