<?php require __DIR__ . '/../layouts/header.php'; ?>

<!-- Hero Section -->
<section class="bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Nền tảng học trực tuyến</h1>
                <p class="lead">Khám phá hàng trăm khóa học chất lượng cao từ các giảng viên giàu kinh nghiệm</p>
                <a href="index.php?controller=Course&action=index" class="btn btn-light btn-lg">
                    <i class="fas fa-book"></i> Khám phá khóa học
                </a>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/500x400?text=Online+Learning" class="img-fluid" alt="Learning">
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses -->
<div class="container my-5">
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="mb-4"><i class="fas fa-star"></i> Khóa học nổi bật</h2>
        </div>
    </div>

    <?php if (!empty($featured)): ?>
        <div class="row">
            <?php foreach ($featured as $course): ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm hover-card">
                        <?php if (!empty($course['image'])): ?>
                            <img src="<?= htmlspecialchars($course['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($course['title']) ?>" style="height: 200px; object-fit: cover;">
                        <?php else: ?>
                            <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                <i class="fas fa-book" style="font-size: 48px; color: #ccc;"></i>
                            </div>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="index.php?controller=Course&action=detail&id=<?= $course['id'] ?>" class="text-dark text-decoration-none">
                                    <?= htmlspecialchars($course['title']) ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted small"><?= htmlspecialchars(substr($course['description'], 0, 80)) ?>...</p>
                        </div>
                        <div class="card-footer bg-white border-top">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-info"><?= htmlspecialchars($course['level']) ?></span>
                                <strong class="text-primary"><?= number_format($course['price'], 0, ',', '.') ?> VND</strong>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <a href="index.php?controller=Course&action=index" class="btn btn-outline-primary btn-lg">
                Xem tất cả khóa học
            </a>
        </div>
    </div>
</div>

<!-- Categories -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="mb-4"><i class="fas fa-th"></i> Danh mục khóa học</h2>
            </div>
        </div>

        <div class="row">
            <?php if (!empty($categories)): ?>
                <?php foreach (array_slice($categories, 0, 6) as $cat): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="index.php?controller=Course&action=index&category=<?= $cat['id'] ?>" class="text-dark text-decoration-none">
                                        <?= htmlspecialchars($cat['name']) ?>
                                    </a>
                                </h5>
                                <p class="card-text text-muted small"><?= htmlspecialchars(substr($cat['description'], 0, 60)) ?>...</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-primary text-white py-5">
    <div class="container text-center">
        <h2 class="mb-4">Bắt đầu học tập ngay hôm nay</h2>
        <p class="lead mb-4">Hơn 1000+ khóa học chất lượng cao đang chờ bạn</p>
        <div>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="index.php?controller=Auth&action=register" class="btn btn-light btn-lg me-3">
                    <i class="fas fa-user-plus"></i> Đăng ký miễn phí
                </a>
            <?php else: ?>
                <a href="index.php?controller=Course&action=index" class="btn btn-light btn-lg">
                    <i class="fas fa-book"></i> Khám phá khóa học
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<style>
.hover-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2) !important;
}
</style>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
