</main>
<footer class="bg-dark text-white mt-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h5><i class="fas fa-graduation-cap"></i> Online Course</h5>
                <p>Nền tảng học trực tuyến toàn diện với các khóa học chất lượng cao.</p>
            </div>
            <div class="col-md-4">
                <h5>Liên kết nhanh</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php?controller=Course&action=index" class="text-white-50">Khóa học</a></li>
                    <li><a href="index.php?controller=Auth&action=login" class="text-white-50">Đăng nhập</a></li>
                    <li><a href="index.php?controller=Auth&action=register" class="text-white-50">Đăng ký</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5>Liên hệ</h5>
                <p class="text-white-50">
                    Email: support@onlinecourse.com<br>
                    Phone: +84 123 456 789
                </p>
            </div>
        </div>
        <hr>
        <div class="text-center text-white-50">
            <p>&copy; <?= date('Y') ?> Online Course. All rights reserved.</p>
        </div>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
