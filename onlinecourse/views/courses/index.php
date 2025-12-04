<?php 
$page_title = "Danh sách khóa học";
require __DIR__ . '/../layouts/header.php'; 
?>

<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="mb-4"><i class="fas fa-book"></i> Danh sách khóa học</h2>
        
        <!-- Form tìm kiếm và lọc -->
        <form method="GET" action="index.php" class="row g-3 mb-4">
            <input type="hidden" name="controller" value="Course">
            <input type="hidden" name="action" value="index">
            
            <div class="col-md-6">
                <input type="text" class="form-control" name="keyword" 
                       placeholder="Tìm kiếm khóa học..." 
                       value="<?php echo isset($_GET['keyword']) ? $_GET['keyword'] : ''; ?>">
            </div>
            
            <div class="col-md-4">
                <select class="form-select" name="category_id">
                    <option value="">Tất cả danh mục</option>
                    <?php foreach($categories as $cat): ?>
                        <option value="<?php echo $cat['id']; ?>"
                                <?php echo (isset($_GET['category_id']) && $_GET['category_id'] == $cat['id']) ? 'selected' : ''; ?>>
                            <?php echo $cat['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-search"></i> Tìm kiếm
                </button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <?php if(count($courses) > 0): ?>
        <?php foreach($courses as $course): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <?php if($course['image']): ?>
                        <img src="assets/uploads/courses/<?php echo $course['image']; ?>" 
                             class="card-img-top" alt="<?php echo $course['title']; ?>"
                             style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                             style="height: 200px;">
                            <i class="fas fa-book fa-3x"></i>
                        </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $course['title']; ?></h5>
                        <p class="card-text text-muted">
                            <?php echo substr($course['description'], 0, 100); ?>...
                        </p>
                        
                        <div class="mb-2">
                            <span class="badge bg-info"><?php echo $course['level']; ?></span>
                            <span class="badge bg-secondary"><?php echo $course['category_name']; ?></span>
                        </div>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-primary fw-bold">
                                <?php echo number_format($course['price']); ?> VNĐ
                            </span>
                            <small class="text-muted">
                                <i class="fas fa-clock"></i> <?php echo $course['duration_weeks']; ?> tuần
                            </small>
                        </div>
                        
                        <div class="mt-2">
                            <small class="text-muted">
                                <i class="fas fa-user"></i> <?php echo $course['instructor_name']; ?>
                            </small>
                        </div>
                    </div>
                    
                    <div class="card-footer bg-white">
                        <a href="index.php?controller=Course&action=detail&id=<?php echo $course['id']; ?>" 
                           class="btn btn-primary w-100">
                            <i class="fas fa-eye"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12">
            <div class="alert alert-info text-center">
                <i class="fas fa-info-circle"></i> Không tìm thấy khóa học nào.
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require __DIR__ . '/../layouts/footer.php'; ?>