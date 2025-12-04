<?php require __DIR__ . '/../../layouts/header.php'; ?>
<h2>Upload tài liệu cho bài học</h2>
<form method="post" enctype="multipart/form-data">
    <label>Chọn file</label>
    <input type="file" name="material" required>
    <button type="submit">Upload</button>
</form>
<?php require __DIR__ . '/../../layouts/footer.php'; ?>
