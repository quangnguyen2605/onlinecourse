<?php
$pageTitle = 'Trang chủ';
require __DIR__ . '/../layouts/header.php';
?>

<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.hero-title {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1.5rem;
}

.hero-subtitle {
    font-size: 1.2rem;
    margin-bottom: 2rem;
    opacity: 0.9;
}

.btn-hero {
    background: white;
    color: #667eea;
    padding: 12px 30px;
    border: none;
    border-radius: 5px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    margin: 0 10px;
    transition: all 0.3s ease;
}

.btn-hero:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
}

.btn-hero-outline {
    background: transparent;
    color: white;
    border: 2px solid white;
}

.btn-hero-outline:hover {
    background: white;
    color: #667eea;
}

.section {
    padding: 60px 0;
}

.section-title {
    font-size: 2.5rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 3rem;
    color: #333;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.feature-card {
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    text-align: center;
    transition: transform 0.3s ease;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.feature-icon {
    font-size: 3rem;
    color: #667eea;
    margin-bottom: 20px;
}

.feature-title {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.feature-text {
    color: #666;
    line-height: 1.6;
}

.course-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-top: 50px;
}

.course-card {
    background: white;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s ease;
}

.course-card:hover {
    transform: translateY(-5px);
}

.course-image {
    height: 200px;
    background: linear-gradient(45deg, #667eea, #764ba2);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 2rem;
}

.course-content {
    padding: 20px;
}

.course-title {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #333;
}

.course-instructor {
    color: #666;
    margin-bottom: 15px;
}

.course-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.course-price {
    font-size: 1.2rem;
    font-weight: 700;
    color: #667eea;
}

.course-rating {
    color: #ffc107;
}

.stats-section {
    background: #f8f9fa;
    padding: 60px 0;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    text-align: center;
}

.stat-item {
    padding: 20px;
}

.stat-number {
    font-size: 3rem;
    font-weight: 700;
    color: #667eea;
    margin-bottom: 10px;
}

.stat-label {
    font-size: 1.1rem;
    color: #666;
}

.cta-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    padding: 80px 0;
    text-align: center;
}

.cta-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 20px;
}

.cta-text {
    font-size: 1.2rem;
    margin-bottom: 30px;
    opacity: 0.9;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .section-title {
        font-size: 2rem;
    }
    
    .feature-grid,
    .course-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="hero-title">Học Lập Trình Trực Tuyến</h1>
        <p class="hero-subtitle">Nâng cao kỹ năng lập trình với các khóa học chất lượng cao</p>
        <div>
            <a href="index.php?controller=Course&action=index" class="btn-hero">Khám phá khóa học</a>
            <a href="#features" class="btn-hero btn-hero-outline">Tìm hiểu thêm</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section" id="features">
    <div class="container">
        <h2 class="section-title">Tại sao chọn chúng tôi?</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <h3 class="feature-title">Học thực tế</h3>
                <p class="feature-text">Thực hành lập trình ngay trên trình duyệt với các bài tập thực tế</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="feature-title">Cộng đồng</h3>
                <p class="feature-text">Kết nối với hàng ngàn học viên và giảng viên</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="feature-title">Chứng nhận</h3>
                <p class="feature-text">Nhận chứng chỉ sau khi hoàn thành khóa học</p>
            </div>
        </div>
    </div>
</section>

<!-- Popular Courses -->
<section class="section bg-light">
    <div class="container">
        <h2 class="section-title">Khóa học nổi bật</h2>
        <div class="course-grid">
            <div class="course-card">
                <div class="course-image">
                    <i class="fas fa-code"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Lập trình Web với React</h3>
                    <p class="course-instructor">Giảng viên: Nguyễn Văn A</p>
                    <div class="course-meta">
                        <span class="course-price">1.299.000đ</span>
                        <span class="course-rating">
                            <i class="fas fa-star"></i> 4.8
                        </span>
                    </div>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image">
                    <i class="fab fa-python"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Python cho người mới bắt đầu</h3>
                    <p class="course-instructor">Giảng viên: Trần Thị B</p>
                    <div class="course-meta">
                        <span class="course-price">999.000đ</span>
                        <span class="course-rating">
                            <i class="fas fa-star"></i> 4.9
                        </span>
                    </div>
                </div>
            </div>
            <div class="course-card">
                <div class="course-image">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Lập trình di động với Flutter</h3>
                    <p class="course-instructor">Giảng viên: Lê Văn C</p>
                    <div class="course-meta">
                        <span class="course-price">1.199.000đ</span>
                        <span class="course-rating">
                            <i class="fas fa-star"></i> 4.7
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <h2 class="section-title">Con số biết nói</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number">50,000+</div>
                <div class="stat-label">Học viên</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">150+</div>
                <div class="stat-label">Khóa học</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">50+</div>
                <div class="stat-label">Giảng viên</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">98%</div>
                <div class="stat-label">Hài lòng</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2 class="cta-title">Sẵn sàng bắt đầu?</h2>
        <p class="cta-text">Tham gia ngay hôm nay để nhận ưu đãi đặc biệt</p>
        <a href="index.php?controller=Auth&action=register" class="btn-hero">Đăng ký ngay</a>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
