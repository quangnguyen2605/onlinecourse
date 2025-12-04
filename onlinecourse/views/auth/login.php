<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="auth-form">
    <h2>Đăng nhập</h2>
    <?php if (!empty($error)): ?>
        <div class="alert error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Email hoặc username</label>
        <input type="text" name="email" required>

        <label>Mật khẩu</label>
        <input type="password" name="password" required>

        <button type="submit">Đăng nhập</button>
    </form>
    <p>Chưa có tài khoản? <a href="index.php?controller=Auth&action=register">Đăng ký</a></p>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
