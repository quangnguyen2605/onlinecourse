<?php require __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h2><i class="fas fa-th"></i> Danh mục khóa học</h2>
        </div>
        <div class="col-md-4 text-end">
            <a href="index.php?controller=Admin&action=createCategory" class="btn btn-primary">
                <i class="fas fa-plus"></i> Thêm danh mục
            </a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= $category['id'] ?></td>
                                    <td><strong><?= htmlspecialchars($category['name']) ?></strong></td>
                                    <td><?= htmlspecialchars(substr($category['description'], 0, 50)) ?>...</td>
                                    <td>
                                        <a href="index.php?controller=Admin&action=editCategory&id=<?= $category['id'] ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Sửa
                                        </a>
                                        <form method="POST" style="display: inline;" onsubmit="return confirm('Xóa danh mục này?');">
                                            <input type="hidden" name="id" value="<?= $category['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-danger" formaction="index.php?controller=Admin&action=deleteCategory">
                                                <i class="fas fa-trash"></i> Xóa
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center text-muted">Không có danh mục nào</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
