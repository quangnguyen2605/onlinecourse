<?php 
require __DIR__ . '/../layouts/header.php';
// Ensure base URL is set
$baseUrl = rtrim((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']), '/');
$baseUrl = str_replace('/views/student', '', $baseUrl); // Adjust this based on your actual URL structure
?>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar with Course Navigation -->
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Danh sách khóa học</h5>
                </div>
                <div class="list-group list-group-flush">
                    <?php if (!empty($courses)): ?>
                        <?php foreach ($courses as $course): ?>
                            <a href="<?= htmlspecialchars($baseUrl) ?>/student/courses/<?= intval($course['id']) ?>" 
                               class="list-group-item list-group-item-action <?= (isset($currentCourseId) && $currentCourseId == $course['id']) ? 'active' : '' ?>">
                                <?= htmlspecialchars($course['title']) ?>
                                <?php if (isset($course['lesson_count'])): ?>
                                    <span class="badge bg-secondary float-end"><?= intval($course['lesson_count']) ?> bài học</span>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="list-group-item">Không có khóa học nào</div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if (!empty($courseLessons)): ?>
                <div class="card">
                    <div class="card-header bg-light">
                        <h6 class="mb-0">Bài học trong khóa</h6>
                    </div>
                    <div class="list-group list-group-flush">
                        <?php foreach ($courseLessons as $les): ?>
                            <a href="<?= htmlspecialchars($baseUrl) ?>/student/lessons/<?= intval($les['id']) ?>" 
                               class="list-group-item list-group-item-action <?= isset($lesson['id']) && $les['id'] == $lesson['id'] ? 'active' : '' ?>">
                                <?= htmlspecialchars($les['title'] ?? 'Không có tiêu đề') ?>
                                <?php if (isset($lesson['id']) && $les['id'] == $lesson['id']): ?>
                                    <i class="fas fa-play float-end mt-1"></i>
                                <?php endif; ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Main Content -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= htmlspecialchars($baseUrl) ?>/student/courses">Khóa học</a></li>
                            <?php if (isset($course) && is_array($course)): ?>
                                <li class="breadcrumb-item"><a href="<?= htmlspecialchars($baseUrl) ?>/student/courses/<?= intval($course['id']) ?>"><?= htmlspecialchars($course['title'] ?? 'Khóa học') ?></a></li>
                            <?php endif; ?>
                            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($lesson['title'] ?? 'Bài học') ?></li>
                        </ol>
                    </nav>

                    <?php if (!empty($lesson['title'])): ?>
                        <h2 class="mb-4"><?= htmlspecialchars($lesson['title']) ?></h2>
                    <?php else: ?>
                        <div class="alert alert-warning">Không tìm thấy tiêu đề bài học</div>
                    <?php endif; ?>

                    <?php if (!empty($lesson['video_url'])): ?>
                        <div class="ratio ratio-16x9 mb-4">
                            <iframe src="<?= htmlspecialchars($lesson['video_url']) ?>" 
                                    allowfullscreen 
                                    class="rounded"
                                    title="Video bài học: <?= htmlspecialchars($lesson['title'] ?? ''); ?>">
                            </iframe>
                        </div>
                    <?php endif; ?>

                    <div class="lesson-content mb-4">
                        <?php if (!empty($lesson['content'])): ?>
                            <?= nl2br(htmlspecialchars($lesson['content'])) ?>
                        <?php else: ?>
                            <div class="alert alert-info">Nội dung bài học đang được cập nhật.</div>
                        <?php endif; ?>
                    </div>

                    <?php if (!empty($materials)): ?>
                        <div class="card">
                            <div class="card-header bg-light">
                                <h5 class="mb-0">Tài liệu đính kèm</h5>
                            </div>
                            <div class="card-body">
                                <div class="list-group">
                                    <?php foreach ($materials as $m): ?>
                                        <a href="<?= htmlspecialchars($baseUrl . '/' . ltrim($m['file_path'], '/')) ?>" 
                                           target="_blank" 
                                           class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                                           download="<?= htmlspecialchars($m['filename']) ?>">
                                            <span>
                                                <?php
                                                $fileType = strtolower($m['file_type'] ?? '');
                                                $icon = 'file-download';
                                                if (strpos($fileType, 'pdf') !== false) {
                                                    $icon = 'file-pdf';
                                                } elseif (strpos($fileType, 'word') !== false || strpos($fileType, 'document') !== false) {
                                                    $icon = 'file-word';
                                                } elseif (strpos($fileType, 'excel') !== false || strpos($fileType, 'spreadsheet') !== false) {
                                                    $icon = 'file-excel';
                                                } elseif (strpos($fileType, 'image') !== false) {
                                                    $icon = 'file-image';
                                                } elseif (strpos($fileType, 'zip') !== false || strpos($fileType, 'rar') !== false || strpos($fileType, '7z') !== false) {
                                                    $icon = 'file-archive';
                                                }
                                                ?>
                                                <i class="fas fa-<?= $icon ?> me-2"></i>
                                                <?= htmlspecialchars($m['filename']) ?>
                                            </span>
                                            <span class="badge bg-secondary"><?= htmlspecialchars($fileType) ?></span>
                                        </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Navigation between lessons -->
                    <?php if (isset($prevLesson) || isset($nextLesson)): ?>
                        <div class="d-flex justify-content-between mt-4">
                            <?php if (isset($prevLesson)): ?>
                                <a href="<?= htmlspecialchars($baseUrl) ?>/student/lessons/<?= intval($prevLesson['id']) ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-arrow-left me-2"></i>Bài trước
                                </a>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                            
                            <?php if (isset($nextLesson)): ?>
                                <a href="<?= htmlspecialchars($baseUrl) ?>/student/lessons/<?= intval($nextLesson['id']) ?>" class="btn btn-primary">
                                    Bài tiếp theo<i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>

<style>
    .lesson-content {
        line-height: 1.8;
        font-size: 1.1rem;
    }
    .lesson-content img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 1rem 0;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
    }
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    .list-group-item.active {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    .breadcrumb {
        background: none;
        padding: 0.5rem 0;
        margin-bottom: 1.5rem;
    }
    .breadcrumb-item + .breadcrumb-item::before {
        content: '›';
    }
</style>
