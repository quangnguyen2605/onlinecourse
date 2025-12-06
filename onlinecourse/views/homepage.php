<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineCourse - Học Lập Trình Trực Tuyến</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2980b9;
            --accent-color: #e74c3c;
            --text-color: #2c3e50;
            --light-gray: #f8f9fa;
            --dark-blue: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
        }

        /* Header Styles */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 0.8rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-color) !important;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 5rem 0;
            margin-bottom: 3rem;
        }

        .hero-content {
            max-width: 600px;
        }

        .hero-title {
            font-size: 2.8rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 1.5rem;
            line-height: 1.3;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            color: #6c757d;
            margin-bottom: 2rem;
        }

        /* Features Section */
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .feature-card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            border: 1px solid #e9ecef;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-blue);
        }

        .feature-text {
            color: #6c757d;
            margin-bottom: 0;
        }

        /* Course Cards */
        .course-card {
            border: 1px solid #e9ecef;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
            background: white;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .course-img {
            height: 160px;
            width: 100%;
            object-fit: cover;
        }

        .course-body {
            padding: 1.25rem;
        }

        .course-category {
            font-size: 0.8rem;
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .course-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-blue);
            line-height: 1.4;
        }

        .course-instructor {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0.75rem;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1rem;
            padding-top: 0.75rem;
            border-top: 1px solid #e9ecef;
        }

        .course-rating {
            color: #f1c40f;
            font-size: 0.9rem;
        }

        .course-price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.1rem;
        }

        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            height: 100%;
            border: 1px solid #e9ecef;
        }

        .testimonial-text {
            font-style: italic;
            color: #6c757d;
            margin-bottom: 1.5rem;
            position: relative;
            padding-left: 1.5rem;
        }

        .testimonial-text:before {
            content: '\201C';
            font-size: 4rem;
            position: absolute;
            left: -1rem;
            top: -1.5rem;
            color: #e9ecef;
            font-family: Georgia, serif;
            line-height: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }

        .testimonial-info h5 {
            margin-bottom: 0.25rem;
            font-size: 1rem;
        }

        .testimonial-info p {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: #6c757d;
        }

        /* CTA Section */
        .cta-section {
            background-color: var(--primary-color);
            color: white;
            padding: 4rem 0;
            margin: 4rem 0 0;
            text-align: center;
        }

        .cta-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-text {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            opacity: 0.9;
        }

        .btn-light {
            background-color: white;
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        /* Footer */
        footer {
            background-color: var(--dark-blue);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .footer-about {
            color: #bdc3c7;
            margin-bottom: 1.5rem;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: #bdc3c7;
            text-decoration: none;
            transition: color 0.3s ease;
            display: block;
        }

        .footer-links a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }

        .footer-contact p {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1rem;
            color: #bdc3c7;
        }

        .footer-contact i {
            margin-right: 1rem;
            color: var(--primary-color);
            margin-top: 4px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            text-align: center;
            color: #bdc3c7;
            font-size: 0.9rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.2rem;
            }
            
            .section-title {
                font-size: 1.75rem;
            }
        }

        @media (max-width: 767.98px) {
            .hero-section {
                padding: 3rem 0;
                text-align: center;
            }
            
            .hero-content {
                margin: 0 auto;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                gap: 1rem;
            }
            
            .hero-buttons .btn {
                width: 100%;
                max-width: 250px;
                margin: 0 auto;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .feature-card, .testimonial-card {
                margin-bottom: 1.5rem;
            }
        }

        @media (max-width: 575.98px) {
            .hero-title {
                font-size: 1.75rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="../../index.php">OnlineCourse</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="../../index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#khoa-hoc">Khóa học</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#danh-muc">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gioi-thieu">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#lien-he">Liên hệ</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <div class="input-group me-3 d-none d-md-flex">
                            <input type="text" class="form-control" placeholder="Tìm kiếm khóa học...">
                            <button class="btn btn-outline-secondary" type="button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <a href="auth/login.php" class="btn btn-outline-primary me-2">Đăng nhập</a>
                        <a href="auth/register.php" class="btn btn-primary">Đăng ký</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">Học Lập Trình Trực Tuyến</h1>
                        <p class="hero-subtitle">Nâng cao kỹ năng lập trình của bạn với các khóa học chất lượng từ các chuyên gia hàng đầu</p>
                        <div class="hero-buttons d-flex gap-3">
                            <a href="#khoa-hoc" class="btn btn-primary btn-lg">Khám phá khóa học</a>
                            <a href="#" class="btn btn-outline-primary btn-lg">Xem video giới thiệu</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" alt="Học lập trình" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="container my-5 py-5" id="tai-sao">
        <h2 class="section-title">Tại sao chọn OnlineCourse?</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="feature-title">Học mọi lúc, mọi nơi</h3>
                    <p class="feature-text">Truy cập khóa học mọi lúc, mọi nơi trên mọi thiết bị. Học tập linh hoạt theo thời gian của bạn.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="feature-title">Giảng viên chuyên nghiệp</h3>
                    <p class="feature-text">Học từ các chuyên gia hàng đầu với nhiều năm kinh nghiệm trong ngành công nghệ thông tin.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h3 class="feature-title">Chứng chỉ sau khóa học</h3>
                    <p class="feature-text">Nhận chứng chỉ hoàn thành khóa học có giá trị để nâng cao hồ sơ cá nhân.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="container my-5 py-5" id="khoa-hoc">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Khóa học nổi bật</h2>
            <a href="#" class="btn btn-outline-primary">Xem tất cả</a>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Lập trình Web" class="course-img">
                    <div class="course-body">
                        <div class="course-category">Web Development</div>
                        <h3 class="course-title">Lập trình Web với ReactJS từ A đến Z</h3>
                        <p class="course-instructor">Bởi Nguyễn Văn A</p>
                        <div class="course-meta">
                            <div class="course-rating">
                                <i class="fas fa-star"></i> 4.8 (1,245)
                            </div>
                            <div class="course-price">
                                1.299.000đ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="course-card">
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Python" class="course-img">
                    <div class="course-body">
                        <div class="course-category">Python</div>
                        <h3 class="course-title">Python cơ bản đến nâng cao</h3>
                        <p class="course-instructor">Bởi Trần Thị B</p>
                        <div class="course-meta">
                            <div class="course-rating">
                                <i class="fas fa-star"></i> 4.9 (2,156)
                            </div>
                            <div class="course-price">
                                999.000đ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="course-card">
                    <img src="https://images.unsplash.com/photo  -1580894732444-8ecded7900cd?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Data Science" class="course-img">
                    <div class="course-body">
                        <div class="course-category">Data Science</div>
                        <h3 class="course-title">Khoa học dữ liệu với Python</h3>
                        <p class="course-instructor">Bởi Lê Văn C</p>
                        <div class="course-meta">
                            <div class="course-rating">
                                <i class="fas fa-star"></i> 4.7 (987)
                            </div>
                            <div class="course-price">
                                1.499.000đ
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="container my-5 py-5" id="danh-muc">
        <h2 class="section-title">Danh mục khóa học</h2>
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-laptop-code fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">Lập trình Web</h5>
                        <p class="text-muted small">HTML, CSS, JavaScript, React, Vue, Angular</p>
                        <a href="#" class="btn btn-sm btn-outline-primary mt-2">Xem khóa học</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-mobile-alt fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">Lập trình di động</h5>
                        <p class="text-muted small">React Native, Flutter, Swift, Kotlin</p>
                        <a href="#" class="btn btn-sm btn-outline-primary mt-2">Xem khóa học</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i class="fas fa-database fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">Cơ sở dữ liệu</h5>
                        <p class="text-muted small">MySQL, MongoDB, PostgreSQL, Firebase</p>
                        <a href="#" class="btn btn-sm btn-outline-primary mt-2">Xem khóa học</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="mb-3">
                            <i fa-robot fa-3x text-primary"></i>
                        </div>
                        <h5 class="card-title mb-2">Trí tuệ nhân tạo</h5>
                        <p class="text-muted small">Machine Learning, Deep Learning, Computer Vision</p>
                        <a href="#" class="btn btn-sm btn-outline-primary mt-2">Xem khóa học</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-light py-5 my-5">
        <div class="container">
            <h2 class="section-title">Học viên nói gì về chúng tôi</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">Khóa học rất chi tiết và dễ hiểu. Giảng viên nhiệt tình hỗ trợ, mình đã tự tin xin việc sau khi hoàn thành khóa học.</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Ngọc Anh" class="testimonial-avatar">
                            <div class="testimonial-info">
                                <h5>Ngọc Anh</h5>
                                <p>Học viên khóa ReactJS</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">Mình đã học được rất nhiều kiến thức bổ ích từ khóa học Python. Cảm ơn đội ngũ giảng viên đã hỗ trợ nhiệt tình.</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Minh Đức" class="testimonial-avatar">
                            <div class="testimonial-info">
                                <h5>Minh Đức</h5>
                                <p>Học viên khóa Python</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">Chất lượng khóa học rất tốt, bài giảng chi tiết và thực tế. Mình đã áp dụng ngay vào công việc hiện tại.</p>
                        <div class="testimonial-author">
                            <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Thu Hà" class="testimonial-avatar">
                            <div class="testimonial-info">
                                <h5>Thu Hà</h5>
                                <p>Học viên khóa Data Science</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2 class="cta-title">Bắt đầu hành trình học tập của bạn ngay hôm nay</h2>
            <p class="cta-text">Tham gia cộng đồng hơn 100,000 học viên đã và đang học tập tại OnlineCourse</p>
            <a href="#" class="btn btn-light btn-lg">Đăng ký ngay</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="../../index.php" class="footer-logo">OnlineCourse</a>
                    <p class="footer-about">OnlineCourse là nền tảng đào tạo trực tuyến hàng đầu Việt Nam, cung cấp các khóa học chất lượng cao về lập trình và công nghệ thông tin.</p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h3 class="footer-title">Về chúng tôi</h3>
                    <ul class="footer-links">
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Đội ngũ giảng viên</a></li>
                        <li><a href="#">Tuyển dụng</a></li>
                        <li><a href="#">Điều khoản dịch vụ</a></li>
                        <li><a href="#">Chính sách bảo mật</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h3 class="footer-title">Danh mục khóa học</h3>
                    <ul class="footer-links">
                        <li><a href="#">Lập trình Web</a></li>
                        <li><a href="#">Lập trình di động</a></li>
                        <li><a href="#">Khoa học dữ liệu</a></li>
                        <li><a href="#">Trí tuệ nhân tạo</a></li>
                        <li><a href="#">Lập trình game</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h3 class="footer-title">Liên hệ</h3>
                    <div class="footer-contact">
                        <p><i class="fas fa-map-marker-alt"></i> 123 Đường ABC, Quận 1, TP.HCM</p>
                        <p><i class="fas fa-phone-alt"></i> 1900 1234</p>
                        <p><i class="fas fa-envelope"></i> info@onlinecourse.vn</p>
                        <p><i class="fas fa-clock"></i> Thứ 2 - Thứ 7: 8:00 - 22:00</p>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="mb-0">&copy; 2023 OnlineCourse. Tất cả các quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

        // Add smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Add fixed header on scroll
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                header.classList.add('fixed-top', 'shadow-sm');
                document.body.style.paddingTop = header.offsetHeight + 'px';
            } else {
                header.classList.remove('fixed-top', 'shadow-sm');
                document.body.style.paddingTop = 0;
            }
        });
    </script>
</body>
</html>
