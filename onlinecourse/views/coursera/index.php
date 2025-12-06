<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OnlineCourse - Học Lập Trình Trực Tuyến</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <style>
        :root {
            --primary-color: #0056d2;
            --secondary-color: #1967d2;
            --accent-color: #ff6b6b;
            --success-color: #28a745;
            --warning-color: #ffc107;
            --text-color: #2d3748;
            --light-gray: #f8f9fa;
            --border-color: #e2e8f0;
            --dark-blue: #1a365d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            overflow-x: hidden;
        }

        /* Header Styles */
        .header-top {
            background-color: #f8f9fa;
            border-bottom: 1px solid var(--border-color);
            padding: 8px 0;
        }

        .header-main {
            background-color: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color) !important;
            display: flex;
            align-items: center;
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-color) !important;
            padding: 0.5rem 1rem !important;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-link.active {
            color: var(--primary-color) !important;
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .search-box {
            position: relative;
            max-width: 400px;
        }

        .search-box input {
            border-radius: 20px;
            padding-left: 40px;
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 86, 210, 0.1);
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 86, 210, 0.3);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
            font-weight: 500;
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-1px);
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2.5rem;
            max-width: 600px;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-image {
            position: relative;
            z-index: 2;
        }

        .hero-image img {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        /* Features Section */
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--dark-blue);
            margin-bottom: 1rem;
            text-align: center;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: #6c757d;
            text-align: center;
            margin-bottom: 3rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--border-color);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .feature-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-blue);
        }

        .feature-text {
            color: #6c757d;
            margin-bottom: 0;
            line-height: 1.7;
        }

        /* Course Cards */
        .course-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            border: 1px solid var(--border-color);
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
        }

        .course-img {
            height: 200px;
            width: 100%;
            object-fit: cover;
            position: relative;
        }

        .course-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--primary-color);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .course-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
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
            margin-bottom: 0.75rem;
            color: var(--dark-blue);
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .course-instructor {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
        }

        .course-rating {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .course-rating .stars {
            color: #ffc107;
            font-size: 0.9rem;
        }

        .course-rating .rating-count {
            color: #6c757d;
            font-size: 0.9rem;
            margin-left: 4px;
        }

        .course-price {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.2rem;
        }

        .course-price .original-price {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 0.9rem;
            margin-right: 8px;
        }

        /* Categories Section */
        .category-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--border-color);
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.15);
            border-color: var(--primary-color);
        }

        .category-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
        }

        .category-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--dark-blue);
        }

        .category-count {
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* Testimonials */
        .testimonial-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            height: 100%;
            border: 1px solid var(--border-color);
            position: relative;
        }

        .testimonial-card::before {
            content: '\201C';
            font-size: 4rem;
            color: var(--primary-color);
            opacity: 0.2;
            position: absolute;
            top: 1rem;
            left: 1.5rem;
            font-family: Georgia, serif;
        }

        .testimonial-text {
            font-style: italic;
            color: #495057;
            margin-bottom: 1.5rem;
            line-height: 1.7;
            position: relative;
            z-index: 1;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary-color);
        }

        .testimonial-info h5 {
            margin-bottom: 0.25rem;
            font-size: 1rem;
            color: var(--dark-blue);
        }

        .testimonial-info p {
            margin-bottom: 0;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .testimonial-rating {
            margin-top: 1rem;
            color: #ffc107;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .stats-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .stat-card {
            text-align: center;
            color: white;
            position: relative;
            z-index: 2;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,160C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') no-repeat bottom;
            background-size: cover;
        }

        .cta-content {
            position: relative;
            z-index: 2;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-text {
            font-size: 1.2rem;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-light {
            background-color: white;
            color: var(--primary-color);
            font-weight: 600;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-light:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        /* Footer */
        footer {
            background-color: var(--dark-blue);
            color: white;
            padding: 60px 0 30px;
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
            line-height: 1.7;
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
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255,255,255,0.1);
            color: white;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-link:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-title::after {
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
            transition: all 0.3s ease;
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
            width: 20px;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 2rem;
            margin-top: 3rem;
            text-align: center;
            color: #bdc3c7;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 991.98px) {
            .hero-title {
                font-size: 2.8rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .search-box {
                max-width: 100%;
                margin: 1rem 0;
            }
        }

        @media (max-width: 767.98px) {
            .hero-section {
                padding: 60px 0;
                text-align: center;
            }
            
            .hero-title {
                font-size: 2.2rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .hero-buttons {
                justify-content: center;
            }
            
            .hero-buttons .btn {
                width: 100%;
                max-width: 250px;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .feature-card, .testimonial-card {
                margin-bottom: 1.5rem;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
            
            .cta-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 575.98px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .section-title {
                font-size: 1.5rem;
            }
            
            .feature-card, .category-card {
                padding: 1.5rem;
            }
        }

        /* Loading Animation */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        /* Fade In Animation */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }
    </style>
</head>
<body>
    <!-- Top Header -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center gap-3">
                        <span class="text-muted"><i class="fas fa-phone"></i> 1900-1234</span>
                        <span class="text-muted"><i class="fas fa-envelope"></i> info@onlinecourse.vn</span>
                    </div>
                </div>
                <div class="col-md-6 text-md-end">
                    <div class="d-flex align-items-center justify-content-md-end gap-3">
                        <a href="#" class="text-muted"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-muted"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="header-main">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <i class="fas fa-graduation-cap"></i>
                    OnlineCourse
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#courses">Khóa học</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#categories">Danh mục</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Về chúng tôi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonials">Đánh giá</a>
                        </li>
                    </ul>
                    <div class="d-flex align-items-center">
                        <div class="search-box me-3">
                            <i class="fas fa-search"></i>
                            <input type="text" class="form-control" placeholder="Tìm kiếm khóa học...">
                        </div>
                        <a href="../auth/login.php" class="btn btn-outline-primary me-2">Đăng nhập</a>
                        <a href="../auth/register.php" class="btn btn-primary">Đăng ký</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <h1 class="hero-title">Học Lập Trình Trực Tuyến</h1>
                        <p class="hero-subtitle">
                            Khám phá các khóa học lập trình chất lượng cao với lộ trình học tập bài bản, 
                            được thiết kế bởi các chuyên gia hàng đầu trong ngành công nghệ thông tin.
                        </p>
                        <div class="hero-buttons">
                            <a href="#courses" class="btn btn-light btn-lg">
                                <i class="fas fa-search"></i> Khám phá khóa học
                            </a>
                            <a href="#" class="btn btn-outline-light btn-lg">
                                <i class="fas fa-play-circle"></i> Xem giới thiệu
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1000&q=80" 
                             alt="Học lập trình" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" id="about">
        <div class="container">
            <h2 class="section-title">Tại sao chọn OnlineCourse?</h2>
            <p class="section-subtitle">
                Nền tảng học tập trực tuyến hàng đầu với nhiều ưu điểm vượt trội, giúp bạn đạt được mục tiêu học tập hiệu quả
            </p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <h3 class="feature-title">Học thực tế</h3>
                        <p class="feature-text">
                            Thực hành lập trình ngay trên trình duyệt với các bài tập thực tế và dự án thực tế, 
                            giúp bạn áp dụng kiến thức vào công việc ngay lập tức.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="feature-title">Cộng đồng</h3>
                        <p class="feature-text">
                            Kết nối với hàng ngàn học viên và giảng viên để trao đổi kiến thức, 
                            chia sẻ kinh nghiệm và giải đáp thắc mắc trong quá trình học tập.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card fade-in">
                        <div class="feature-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="feature-title">Chứng nhận</h3>
                        <p class="feature-text">
                            Nhận chứng chỉ sau khi hoàn thành khóa học, giúp bạn nổi bật hơn trong mắt nhà tuyển dụng 
                            và mở rộng cơ hội nghề nghiệp.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Courses -->
    <section class="py-5 bg-light" id="courses">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h2 class="section-title">Khóa học nổi bật</h2>
                    <p class="section-subtitle">
                        Các khóa học được nhiều học viên quan tâm và đánh giá cao
                    </p>
                </div>
            </div>
            
            <div class="row g-4" id="courses-container">
                <!-- Courses will be loaded here -->
            </div>
            
            <div class="text-center mt-4">
                <a href="#" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-arrow-right"></i> Xem tất cả khóa học
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-5" id="categories">
        <div class="container">
            <h2 class="section-title">Danh mục khóa học</h2>
            <p class="section-subtitle">
                Khám phá các danh mục khóa học phù hợp với nhu cầu và mục tiêu của bạn
            </p>
            <div class="row g-4" id="categories-container">
                <!-- Categories will be loaded here -->
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number" data-count="50000">0</div>
                        <div class="stat-label">Học viên</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number" data-count="150">0</div>
                        <div class="stat-label">Khóa học</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number" data-count="50">0</div>
                        <div class="stat-label">Giảng viên</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <div class="stat-number" data-count="98">0<small>%</small></div>
                        <div class="stat-label">Hài lòng</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-5 bg-light" id="testimonials">
        <div class="container">
            <h2 class="section-title">Học viên nói gì về chúng tôi</h2>
            <p class="section-subtitle">
                Những chia sẻ chân thực từ học viên đã hoàn thành khóa học
            </p>
            <div class="row g-4" id="testimonials-container">
                <!-- Testimonials will be loaded here -->
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Sẵn sàng bắt đầu hành trình lập trình?</h2>
                <p class="cta-text">
                    Tham gia ngay hôm nay và nhận ưu đãi đặc biệt dành cho học viên mới
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="../auth/register.php" class="btn btn-light btn-lg">
                        <i class="fas fa-rocket"></i> Bắt đầu học miễn phí
                    </a>
                    <a href="#courses" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-book-open"></i> Khám phá khóa học
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <a href="#" class="footer-logo">
                        <i class="fas fa-graduation-cap"></i> OnlineCourse
                    </a>
                    <p class="footer-about">
                        OnlineCourse là nền tảng đào tạo trực tuyến hàng đầu Việt Nam, 
                        cung cấp các khóa học chất lượng cao về lập trình và công nghệ thông tin.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
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
                        <p><i class="fas fa-phone-alt"></i> 1900-1234</p>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        // Sample data
        const courses = [
            {
                id: 1,
                title: "Lập trình Web với ReactJS từ A đến Z",
                category: "Web Development",
                instructor: "Nguyễn Văn A",
                rating: 4.8,
                ratingCount: 1245,
                price: 1299000,
                originalPrice: 1999000,
                badge: "Bán chạy",
                image: "https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 2,
                title: "Python cơ bản đến nâng cao",
                category: "Python",
                instructor: "Trần Thị B",
                rating: 4.9,
                ratingCount: 2156,
                price: 999000,
                originalPrice: 1499000,
                badge: "Phổ biến",
                image: "https://images.unsplash.com/photo-1517694712202-14dd9538aa97?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 3,
                title: "Khoa học dữ liệu với Python",
                category: "Data Science",
                instructor: "Lê Văn C",
                rating: 4.7,
                ratingCount: 987,
                price: 1499000,
                originalPrice: 1999000,
                badge: "Mới",
                image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 4,
                title: "Lập trình di động với Flutter",
                category: "Mobile Development",
                instructor: "Phạm Thị D",
                rating: 4.6,
                ratingCount: 756,
                price: 1199000,
                originalPrice: 1799000,
                badge: "Hot",
                image: "https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 5,
                title: "Machine Learning cơ bản",
                category: "AI/ML",
                instructor: "Hoàng Văn E",
                rating: 4.8,
                ratingCount: 1432,
                price: 1799000,
                originalPrice: 2499000,
                badge: "Nâng cao",
                image: "https://images.unsplash.com/photo-1555949963-ff9fe0c870eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
            },
            {
                id: 6,
                title: "Lập trình Node.js và Express",
                category: "Backend Development",
                instructor: "Ngô Thị F",
                rating: 4.7,
                ratingCount: 892,
                price: 1099000,
                originalPrice: 1599000,
                badge: "Phổ biến",
                image: "https://images.unsplash.com/photo-1578662996442-48f60103fc96?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80"
            }
        ];

        const categories = [
            { name: "Lập trình Web", icon: "fa-laptop-code", count: 45 },
            { name: "Lập trình di động", icon: "fa-mobile-alt", count: 32 },
            { name: "Khoa học dữ liệu", icon: "fa-database", count: 28 },
            { name: "Trí tuệ nhân tạo", icon: "fa-robot", count: 21 },
            { name: "Lập trình game", icon: "fa-gamepad", count: 18 },
            { name: "DevOps", icon: "fa-server", count: 15 },
            { name: "Security", icon: "fa-shield-alt", count: 12 },
            { name: "Blockchain", icon: "fa-link", count: 8 }
        ];

        const testimonials = [
            {
                name: "Ngọc Anh",
                role: "Học viên khóa ReactJS",
                avatar: "https://randomuser.me/api/portraits/women/32.jpg",
                text: "Khóa học rất chi tiết và dễ hiểu. Giảng viên nhiệt tình hỗ trợ, mình đã tự tin xin việc sau khi hoàn thành khóa học.",
                rating: 5
            },
            {
                name: "Minh Đức",
                role: "Học viên khóa Python",
                avatar: "https://randomuser.me/api/portraits/men/45.jpg",
                text: "Mình đã học được rất nhiều kiến thức bổ ích từ khóa học Python. Cảm ơn đội ngũ giảng viên đã hỗ trợ nhiệt tình.",
                rating: 5
            },
            {
                name: "Thu Hà",
                role: "Học viên khóa Data Science",
                avatar: "https://randomuser.me/api/portraits/women/65.jpg",
                text: "Chất lượng khóa học rất tốt, bài giảng chi tiết và thực tế. Mình đã áp dụng ngay vào công việc hiện tại.",
                rating: 5
            },
            {
                name: "Quang Huy",
                role: "Học viên khóa Flutter",
                avatar: "https://randomuser.me/api/portraits/men/32.jpg",
                text: "Khóa học rất chất lượng, nội dung bám sát thực tế. Giảng viên giải thích rất rõ ràng và dễ hiểu.",
                rating: 5
            },
            {
                name: "Lan Chi",
                role: "Học viên khóa Machine Learning",
                avatar: "https://randomuser.me/api/portraits/women/28.jpg",
                text: "Mình rất hài lòng với khóa học. Kiến thức được truyền đạt một cách hệ thống và dễ tiếp thu.",
                rating: 5
            },
            {
                name: "Anh Tuấn",
                role: "Học viên khóa Node.js",
                avatar: "https://randomuser.me/api/portraits/men/56.jpg",
                text: "Khóa học vượt xa mong đợi. Giảng viên rất chuyên môn và luôn sẵn sàng giải đáp thắc mắc.",
                rating: 5
            }
        ];

        // Load courses
        function loadCourses() {
            const container = document.getElementById('courses-container');
            container.innerHTML = courses.map(course => `
                <div class="col-md-6 col-lg-4">
                    <div class="course-card">
                        <div class="position-relative">
                            <img src="${course.image}" alt="${course.title}" class="course-img">
                            <span class="course-badge">${course.badge}</span>
                        </div>
                        <div class="course-body">
                            <div class="course-category">${course.category}</div>
                            <h3 class="course-title">${course.title}</h3>
                            <p class="course-instructor">Bởi ${course.instructor}</p>
                            <div class="course-meta">
                                <div class="course-rating">
                                    <span class="stars">
                                        ${generateStars(course.rating)}
                                    </span>
                                    <span class="rating-count">${course.rating}</span>
                                    <span class="rating-count">(${course.ratingCount})</span>
                                </div>
                                <div class="course-price">
                                    ${course.originalPrice ? `<span class="original-price">${formatCurrency(course.originalPrice)}</span>` : ''}
                                    ${formatCurrency(course.price)}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Load categories
        function loadCategories() {
            const container = document.getElementById('categories-container');
            container.innerHTML = categories.map(category => `
                <div class="col-md-6 col-lg-3">
                    <div class="category-card">
                        <div class="category-icon">
                            <i class="fas ${category.icon}"></i>
                        </div>
                        <h3 class="category-title">${category.name}</h3>
                        <p class="category-count">${category.count} khóa học</p>
                    </div>
                </div>
            `).join('');
        }

        // Load testimonials
        function loadTestimonials() {
            const container = document.getElementById('testimonials-container');
            container.innerHTML = testimonials.map(testimonial => `
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card">
                        <p class="testimonial-text">${testimonial.text}</p>
                        <div class="testimonial-author">
                            <img src="${testimonial.avatar}" alt="${testimonial.name}" class="testimonial-avatar">
                            <div class="testimonial-info">
                                <h5>${testimonial.name}</h5>
                                <p>${testimonial.role}</p>
                            </div>
                        </div>
                        <div class="testimonial-rating">
                            ${generateStars(testimonial.rating)}
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Helper functions
        function generateStars(rating) {
            const fullStars = Math.floor(rating);
            const halfStar = rating % 1 >= 0.5 ? 1 : 0;
            const emptyStars = 5 - fullStars - halfStar;
            
            let stars = '';
            for (let i = 0; i < fullStars; i++) {
                stars += '<i class="fas fa-star"></i>';
            }
            if (halfStar) {
                stars += '<i class="fas fa-star-half-alt"></i>';
            }
            for (let i = 0; i < emptyStars; i++) {
                stars += '<i class="far fa-star"></i>';
            }
            return stars;
        }

        function formatCurrency(amount) {
            return new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                minimumFractionDigits: 0
            }).format(amount);
        }

        // Animated counter for stats
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                element.textContent = Math.floor(current).toLocaleString();
            }, 16);
        }

        // Fade in animation
        function handleScroll() {
            const elements = document.querySelectorAll('.fade-in');
            elements.forEach(element => {
                const rect = element.getBoundingClientRect();
                const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
                if (isVisible) {
                    element.classList.add('visible');
                }
            });
        }

        // Initialize everything when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Load content
            loadCourses();
            loadCategories();
            loadTestimonials();
            
            // Initialize animations
            handleScroll();
            window.addEventListener('scroll', handleScroll);
            
            // Animate stats when visible
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const statNumber = entry.target;
                        const target = parseInt(statNumber.getAttribute('data-count'));
                        animateCounter(statNumber, target);
                        observer.unobserve(statNumber);
                    }
                });
            });
            
            document.querySelectorAll('.stat-number').forEach(stat => {
                observer.observe(stat);
            });
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
            
            // Add hover effects to course cards
            document.querySelectorAll('.course-card').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>
