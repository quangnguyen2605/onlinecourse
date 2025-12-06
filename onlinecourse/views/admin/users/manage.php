<?php require __DIR__ . '/../../layouts/header.php'; ?>

<div class="container my-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <h2><i class="fas fa-users"></i> Quản lý người dùng</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th>Vai trò</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= $user['id'] ?></td>
                                    <td><?= htmlspecialchars($user['username']) ?></td>
                                    <td><?= htmlspecialchars($user['fullname']) ?></td>
                                    <td><?= htmlspecialchars($user['email']) ?></td>
                                    <td>
                                        <?php 
                                        $roles = [0 => 'Học viên', 1 => 'Giảng viên', 2 => 'Quản trị viên'];
                                        echo htmlspecialchars($roles[$user['role']] ?? 'Unknown');
                                        ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-<?= ($user['status'] == 'active') ? 'success' : 'danger' ?>">
                                            <?= htmlspecialchars($user['status']) ?>
                                        </span>
                                    </td>
                                    <td>
                                        <?php if ($user['id'] != $_SESSION['user_id']): ?>
                                            <form method="POST" style="display: inline;">
                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                <input type="hidden" name="status" value="<?= ($user['status'] == 'active') ? 'inactive' : 'active' ?>">
                                                <button type="submit" class="btn btn-sm btn-warning" formaction="index.php?controller=Admin&action=updateUserStatus">
                                                    <?= ($user['status'] == 'active') ? 'Vô hiệu' : 'Kích hoạt' ?>
                                                </button>
                                            </form>
                                            <form method="POST" style="display: inline;" onsubmit="return confirm('Xác nhận xóa người dùng này?');">
                                                <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" formaction="index.php?controller=Admin&action=deleteUser">
                                                    Xóa
                                                </button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-muted small">(Bạn)</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">Không có người dùng nào</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require __DIR__ . '/../../layouts/footer.php'; ?>
