<?php require __DIR__ . '/../layouts/header.php'; ?>
<div class="auth-form">
    <h2>Đăng ký</h2>
    <?php if (!empty($error)): ?>
        <div class="alert error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="post">
        <label>Username</label>
        <input type="text" name="username" required>

        <label>Họ tên</label>
        <input type="text" name="fullname" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Mật khẩu</label>
        <input type="password" name="password" required>

        <label>Nhập lại mật khẩu</label>
        <input type="password" name="confirm_password" required>

        <button type="submit">Đăng ký</button>
    </form>
    <p>Đã có tài khoản? <a href="index.php?controller=Auth&action=login">Đăng nhập</a></p>
</div>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
