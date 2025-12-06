<?php require __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-tachometer-alt"></i> Dashboard Quản trị viên</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h6>Tổng học viên</h6>
                    <h3><?= $students ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h6>Tổng giảng viên</h6>
                    <h3><?= $instructors ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-info text-white">
                <div class="card-body text-center">
                    <h6>Tổng khóa học</h6>
                    <h3><?= $courses ?? 0 ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card bg-warning text-white">
                <div class="card-body text-center">
                    <h6>Tổng đăng ký</h6>
                    <h3><?= $enrollments ?? 0 ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-cog"></i> Quản lý</h5>
                </div>
                <div class="card-body">
                    <a href="index.php?controller=Admin&action=users" class="btn btn-outline-primary w-100 mb-2">
                        <i class="fas fa-users"></i> Quản lý người dùng
                    </a>
                    <a href="index.php?controller=Admin&action=categories" class="btn btn-outline-primary w-100 mb-2">
                        <i class="fas fa-th"></i> Quản lý danh mục
                    </a>
                    <a href="index.php?controller=Admin&action=approveCourses" class="btn btn-outline-primary w-100 mb-2">
                        <i class="fas fa-check-circle"></i> Duyệt khóa học
                    </a>
                    <a href="index.php?controller=Admin&action=statistics" class="btn btn-outline-primary w-100">
                        <i class="fas fa-chart-bar"></i> Thống kê
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-info-circle"></i> Thông tin hệ thống</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Phiên bản:</strong> 1.0</li>
                        <li class="mb-2"><strong>Ngôn ngữ:</strong> PHP</li>
                        <li class="mb-2"><strong>Cơ sở dữ liệu:</strong> MySQL</li>
                        <li><strong>Ngày cập nhật:</strong> <?= date('d/m/Y H:i:s') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
