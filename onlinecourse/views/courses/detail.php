<?php 
$pageTitle = $course['title'];
require __DIR__ . '/../layouts/header.php'; 
?>

<div class="container py-4">
    <!-- Course Header -->
    <div class="course-detail">
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="badge bg-info"><?= htmlspecialchars($course['level']) ?></span>
                        <span class="badge bg-secondary"><?= htmlspecialchars($course['category_name'] ?? 'Programming') ?></span>
                        <span class="badge bg-success">Đã được duyệt</span>
                    </div>
                    
                    <h1 class="fw-bold mb-3"><?= htmlspecialchars($course['title']) ?></h1>
                    
                    <div class="course-meta mb-4">
                        <div class="meta-item">
                            <i class="fas fa-user"></i>
                            <span><?= htmlspecialchars($course['instructor_name'] ?? 'Giảng viên') ?></span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-clock"></i>
                            <span><?= (int)$course['duration_weeks'] ?> tuần</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-users"></i>
                            <span>1,234 học viên</span>
                        </div>
                        <div class="meta-item">
                            <i class="fas fa-star text-warning"></i>
                            <span>4.8 (234 đánh giá)</span>
                        </div>
                    </div>
                    
                    <div class="price-section mb-4">
                        <h3 class="text-primary fw-bold"><?= number_format($course['price'], 0) ?> VNĐ</h3>
                        <p class="text-muted">Trọn đời • Học mọi lúc mọi nơi • Chứng nhận hoàn thành</p>
                    </div>
                    
                    <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 0): ?>
                        <?php if ($isEnrolled): ?>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle"></i> Bạn đã đăng ký khóa học này
                                <a href="index.php?controller=Enrollment&action=progress&course_id=<?= $course['id'] ?>" class="btn btn-sm btn-primary ms-2">
                                    Tiếp tục học
                                </a>
                            </div>
                        <?php else: ?>
                            <a href="index.php?controller=Enrollment&action=enroll&course_id=<?= $course['id'] ?>" 
                               class="btn btn-primary btn-lg me-3">
                                <i class="fas fa-user-plus"></i> Đăng ký ngay
                            </a>
                        <?php endif; ?>
                    <?php elseif (!isset($_SESSION['user_id'])): ?>
                        <a href="index.php?controller=Auth&action=login" class="btn btn-primary btn-lg me-3">
                            <i class="fas fa-sign-in-alt"></i> Đăng nhập để đăng ký
                        </a>
                    <?php endif; ?>
                </div>
                
                <!-- Course Description -->
                <div class="mb-5">
                    <h3 class="fw-bold mb-3">Mô tả khóa học</h3>
                    <div class="text-muted">
                        <?= nl2br(htmlspecialchars($course['description'])) ?>
                    </div>
                </div>
                
                <!-- Course Content -->
                <div class="mb-5">
                    <h3 class="fw-bold mb-3">Nội dung khóa học</h3>
                    <div class="accordion" id="courseContent">
                        <?php if (!empty($lessons)): ?>
                            <?php foreach ($lessons as $index => $lesson): ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading<?= $index ?>">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" 
                                                data-bs-target="#lesson<?= $index ?>" aria-expanded="true">
                                            <i class="fas fa-play-circle me-2"></i>
                                            Bài <?= $index + 1 ?>: <?= htmlspecialchars($lesson['title']) ?>
                                        </button>
                                    </h2>
                                    <div id="lesson<?= $index ?>" class="accordion-collapse collapse show" 
                                         aria-labelledby="heading<?= $index ?>" data-bs-parent="#courseContent">
                                        <div class="accordion-body">
                                            <p><?= nl2br(htmlspecialchars($lesson['content'])) ?></p>
                                            <?php if ($lesson['video_url']): ?>
                                                <a href="<?= htmlspecialchars($lesson['video_url']) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                                    <i class="fas fa-video"></i> Xem video
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted">Nội dung khóa học đang được cập nhật...</p>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Course Materials -->
                <?php if (!empty($materials)): ?>
                <div class="mb-5">
                    <h3 class="fw-bold mb-3">Tài liệu học tập</h3>
                    <div class="list-group">
                        <?php foreach ($materials as $material): ?>
                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-file-pdf text-danger me-2"></i>
                                    <?= htmlspecialchars($material['filename']) ?>
                                </div>
                                <a href="<?= htmlspecialchars($material['file_path']) ?>" class="btn btn-sm btn-outline-primary" target="_blank">
                                    <i class="fas fa-download"></i> Tải xuống
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="sticky-top" style="top: 100px;">
                    <!-- Course Info Card -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3">Thông tin khóa học</h5>
                            
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fas fa-clock"></i> Thời lượng</span>
                                    <span><?= (int)$course['duration_weeks'] ?> tuần</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fas fa-signal"></i> Cấp độ</span>
                                    <span><?= htmlspecialchars($course['level']) ?></span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fas fa-users"></i> Học viên</span>
                                    <span>1,234</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fas fa-certificate"></i> Chứng nhận</span>
                                    <span>Có</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span><i class="fas fa-language"></i> Ngôn ngữ</span>
                                    <span>Tiếng Việt</span>
                                </div>
                            </div>
                            
                            <?php if (isset($_SESSION['user_id']) && $_SESSION['user_role'] == 0 && !$isEnrolled): ?>
                                <a href="index.php?controller=Enrollment&action=enroll&course_id=<?= $course['id'] ?>" 
                                   class="btn btn-primary w-100 btn-lg">
                                    <i class="fas fa-user-plus"></i> Đăng ký khóa học
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Instructor Card -->
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3">Giảng viên</h5>
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0"><?= htmlspecialchars($course['instructor_name'] ?? 'Giảng viên') ?></h6>
                                    <small class="text-muted">Chuyên gia lập trình</small>
                                </div>
                            </div>
                            <p class="text-muted small">
                                Giảng viên có kinh nghiệm 5+ năm trong ngành lập trình web và mobile.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
