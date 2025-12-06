<?php require __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12">
            <h2><i class="fas fa-chart-line"></i> Tiến độ học tập - <?= htmlspecialchars($course['title']) ?></h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Bài học trong khóa</h5>
                </div>
                <div class="card-body">
                    <div class="progress mb-4" style="height: 25px;">
                        <div class="progress-bar" style="width: <?= (int)($enrollment['progress'] ?? 0) ?>%">
                            <?= (int)($enrollment['progress'] ?? 0) ?>%
                        </div>
                    </div>

                    <div class="list-group">
                        <?php if (!empty($lessons)): ?>
                            <?php foreach ($lessons as $lesson): ?>
                                <a href="index.php?controller=Student&action=lessonView&lessonId=<?= $lesson['id'] ?>" class="list-group-item list-group-item-action">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="mb-1">
                                                <i class="fas fa-play-circle text-primary"></i> <?= htmlspecialchars($lesson['title']) ?>
                                            </h6>
                                            <p class="mb-0 text-muted small"><?= date('d/m/Y', strtotime($lesson['created_at'])) ?></p>
                                        </div>
                                        <i class="fas fa-chevron-right text-muted"></i>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted">Chưa có bài học nào</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6><i class="fas fa-info-circle"></i> Thống kê</h6>
                    <ul class="list-unstyled">
                        <li class="mb-3 pb-3 border-bottom">
                            <span class="text-muted small">Tổng bài học:</span><br>
                            <strong class="text-primary" style="font-size: 24px;"><?= count($lessons ?? []) ?></strong>
                        </li>
                        <li class="mb-3 pb-3 border-bottom">
                            <span class="text-muted small">Hoàn thành:</span><br>
                            <strong class="text-success" style="font-size: 24px;"><?= (int)($enrollment['completed_lessons'] ?? 0) ?></strong>
                        </li>
                        <li class="mb-3 pb-3 border-bottom">
                            <span class="text-muted small">Tiến độ:</span><br>
                            <strong class="text-info" style="font-size: 24px;"><?= (int)($enrollment['progress'] ?? 0) ?>%</strong>
                        </li>
                        <li>
                            <span class="text-muted small">Trạng thái:</span><br>
                            <span class="badge bg-info fs-6"><?= htmlspecialchars($enrollment['status'] ?? 'active') ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
