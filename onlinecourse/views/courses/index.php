<?php require __DIR__ . '/../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2 class="mb-4"><i class="fas fa-book"></i> Danh sách khóa học</h2>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-12">
            <form method="get" class="row g-3">
                <input type="hidden" name="controller" value="Course">
                <input type="hidden" name="action" value="index">
                <div class="col-md-6">
                    <input type="text" name="keyword" class="form-control" placeholder="Tìm kiếm khóa học..." value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-select">
                        <option value="">Tất cả danh mục</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= $cat['id'] ?>" <?= (($_GET['category'] ?? '') == $cat['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat['name']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>

    <?php if (empty($courses)): ?>
        <div class="alert alert-info">
            <i class="fas fa-info-circle"></i> Không tìm thấy khóa học nào.
        </div>
    <?php else: ?>
        <div class="row">
            <?php foreach ($courses as $course): ?>
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
                            <p class="card-text text-muted small"><?= htmlspecialchars(substr($course['description'], 0, 100)) ?>...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-info"><?= htmlspecialchars($course['level']) ?></span>
                                <strong class="text-primary"><?= number_format($course['price'], 0, ',', '.') ?> VND</strong>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top">
                            <a href="index.php?controller=Course&action=detail&id=<?= $course['id'] ?>" class="btn btn-primary btn-sm w-100">
                                <i class="fas fa-eye"></i> Xem chi tiết
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

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
        <?php endforeach; ?>
    </div>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
