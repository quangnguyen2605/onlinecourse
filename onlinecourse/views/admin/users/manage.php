<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Quản lý người dùng</h2>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Role</th>
    </tr>
    <?php foreach ($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= htmlspecialchars($u['username']) ?></td>
            <td><?= htmlspecialchars($u['fullname']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= (int)$u['role'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
