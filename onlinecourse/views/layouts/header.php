<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'Online Course' ?> - Nền tảng học trực tuyến</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="fas fa-graduation-cap"></i> Online Course
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?controller=Course&action=index">Khóa học</a>
                </li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['user_role'] == 0): ?>
                        <!-- Student Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Student&action=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Student&action=myCourses">Khóa học của tôi</a>
                        </li>
                    <?php elseif ($_SESSION['user_role'] == 1): ?>
                        <!-- Instructor Menu -->
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Instructor&action=dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Instructor&action=myCourses">Khóa học của tôi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=Instructor&action=createCourse">Tạo khóa học</a>
                        </li>
                    <?php elseif ($_SESSION['user_role'] == 2): ?>
                        <!-- Admin Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button" data-bs-toggle="dropdown">
                                Quản trị
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="adminMenu">
                                <li><a class="dropdown-item" href="index.php?controller=Admin&action=dashboard">Dashboard</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=Admin&action=users">Quản lý người dùng</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=Admin&action=categories">Danh mục</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=Admin&action=approveCourses">Duyệt khóa học</a></li>
                                <li><a class="dropdown-item" href="index.php?controller=Admin&action=statistics">Thống kê</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userMenu" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user"></i> <?php echo htmlspecialchars($_SESSION['user_fullname'] ?? 'User'); ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="index.php?controller=Auth&action=profile">Thông tin cá nhân</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.php?controller=Auth&action=logout">Đăng xuất</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?controller=Auth&action=login">Đăng nhập</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-primary ms-2" href="index.php?controller=Auth&action=register">Đăng ký</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<main class="site-main">
