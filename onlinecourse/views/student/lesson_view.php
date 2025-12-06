<?php require __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2><?= htmlspecialchars($lesson['title']) ?></h2>
                    <p class="text-muted">Khóa học: <strong><?= htmlspecialchars($course['title'] ?? '') ?></strong></p>
                </div>
            </div>

            <?php if (!empty($lesson['video_url'])): ?>
                <div class="card mb-4">
                    <div class="card-body">
                        <h5>Video bài học</h5>
                        <iframe width="100%" height="400" src="<?= htmlspecialchars($lesson['video_url']) ?>" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            <?php endif; ?>

            <div class="card mb-4">
                <div class="card-body">
                    <h5>Nội dung bài học</h5>
                    <div class="lesson-content">
                        <?= nl2br(htmlspecialchars($lesson['content'])) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h6><i class="fas fa-paperclip"></i> Tài liệu tham khảo</h6>
                    <?php if (!empty($materials)): ?>
                        <div class="list-group list-group-flush">
                            <?php foreach ($materials as $m): ?>
                                <a href="<?= htmlspecialchars($m['file_path']) ?>" class="list-group-item list-group-item-action" download>
                                    <i class="fas fa-file-download"></i> 
                                    <small><?= htmlspecialchars($m['filename']) ?></small>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-muted small">Không có tài liệu nào</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <a href="index.php?controller=Student&action=courseProgress&courseId=<?= $course['id'] ?? '' ?>" class="btn btn-primary btn-sm w-100">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
