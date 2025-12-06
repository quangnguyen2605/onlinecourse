<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Học viên đăng ký - <?= htmlspecialchars($course['title']) ?></h2>
<table border="1" cellpadding="6" cellspacing="0">
    <tr>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Trạng thái</th>
        <th>Tiến độ</th>
    </tr>
    <?php foreach ($students as $s): ?>
        <tr>
            <td><?= htmlspecialchars($s['fullname']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= htmlspecialchars($s['status']) ?></td>
            <td><?= (int)$s['progress'] ?>%</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
