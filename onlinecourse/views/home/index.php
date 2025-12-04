<?php
$pageTitle = 'Trang chủ';
require __DIR__ . '/../layouts/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title fade-in-up">
                    Học Lập Trình <span class="text-warning">Trực Tuyến</span>
                </h1>
                <p class="hero-subtitle fade-in-up">
                    Khám phá các khóa học lập trình chất lượng cao với lộ trình học tập bài bản, 
                    được thiết kế bởi các chuyên gia hàng đầu.
                </p>
                <div class="d-flex gap-3 fade-in-up">
                    <a href="index.php?controller=Course&action=index" class="btn btn-light btn-lg">
                        <i class="fas fa-search"></i> Khám phá khóa học
                    </a>
                    <a href="index.php?controller=Auth&action=register" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-user-plus"></i> Đăng ký miễn phí
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <i class="fas fa-code" style="font-size: 15rem; opacity: 0.3;"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-12">
                <h2 class="fw-bold mb-3">Tại sao chọn OnlineCourse?</h2>
                <p class="text-muted">Nền tảng học tập trực tuyến với nhiều ưu điểm vượt trội</p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-laptop-code fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Học thực tế</h5>
                    <p class="text-muted">Thực hành lập trình ngay trên trình duyệt với các bài tập thực tế</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-users fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Cộng đồng</h5>
                    <p class="text-muted">Kết nối với hàng ngàn học viên và chia sẻ kiến thức</p>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="text-center">
                    <div class="feature-icon mb-3">
                        <i class="fas fa-certificate fa-3x text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-2">Chứng nhận</h5>
                    <p class="text-muted">Nhận chứng nhận hoàn thành khóa học có giá trị</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Popular Courses -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="fw-bold mb-3">Khóa học phổ biến</h2>
                <p class="text-muted">Các khóa học được nhiều học viên quan tâm</p>
            </div>
        </div>
        
        <div class="row g-4">
            <?php
            // Lấy một vài khóa học mẫu để hiển thị
            $courseModel = new Course();
            $popularCourses = $courseModel->searchApproved('', 3); // Giới hạn 3 khóa học
            
            foreach (array_slice($popularCourses, 0, 3) as $course):
            ?>
            <div class="col-md-4">
                <div class="course-card">
                    <div class="card-img-top d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));">
                        <i class="fas fa-code fa-3x text-white"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($course['title']) ?></h5>
                        <p class="card-text"><?= substr(htmlspecialchars($course['description']), 0, 100) ?>...</p>
                        
                        <div class="mb-2">
                            <span class="badge bg-info"><?= htmlspecialchars($course['level']) ?></span>
                            <span class="badge bg-secondary"><?= htmlspecialchars($course['category_name'] ?? 'Programming') ?></span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-primary fw-bold">
                                <?= number_format($course['price'], 0) ?> VNĐ
                            </span>
                            <small class="text-muted">
                                <i class="fas fa-clock"></i> <?= $course['duration_weeks'] ?> tuần
                            </small>
                        </div>
                        
                        <a href="index.php?controller=Course&action=detail&id=<?= $course['id'] ?>" 
                           class="btn btn-primary w-100">
                            <i class="fas fa-eye"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center mt-4">
            <a href="index.php?controller=Course&action=index" class="btn btn-outline-primary btn-lg">
                <i class="fas fa-arrow-right"></i> Xem tất cả khóa học
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-label">Học viên</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number" data-count="50">0</div>
                    <div class="stat-label">Khóa học</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number" data-count="20">0</div>
                    <div class="stat-label">Giảng viên</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number" data-count="95">0</div>
                    <div class="stat-label">% Hoàn thành</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
    <div class="container text-center">
        <h2 class="text-white fw-bold mb-3">Sẵn sàng bắt đầu hành trình lập trình?</h2>
        <p class="text-white mb-4">Tham gia ngay hôm nay và nhận ưu đãi đặc biệt</p>
        <div class="d-flex gap-3 justify-content-center">
            <a href="index.php?controller=Auth&action=register" class="btn btn-light btn-lg">
                <i class="fas fa-rocket"></i> Bắt đầu học miễn phí
            </a>
            <a href="index.php?controller=Course&action=index" class="btn btn-outline-light btn-lg">
                <i class="fas fa-book-open"></i> Khám phá khóa học
            </a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>

<script>
// Animated counter for stats
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200;

    counters.forEach(counter => {
        const animate = () => {
            const value = +counter.getAttribute('data-count');
            const data = +counter.innerText;
            const time = value / speed;
            
            if (data < value) {
                counter.innerText = Math.ceil(data + time);
                setTimeout(animate, 1);
            } else {
                counter.innerText = value;
            }
        }
        
        animate();
    });
});
</script>
