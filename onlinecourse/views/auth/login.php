<?php 
$pageTitle = 'Đăng nhập';
require __DIR__ . '/../layouts/header.php'; 
?>

<style>
.login-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
}

.login-form {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    padding: 2rem;
    width: 100%;
    max-width: 400px;
}

.login-form h2 {
    color: #333;
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1.5rem;
    text-align: center;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    color: #555;
    font-weight: 500;
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
}

.form-group input {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 0.95rem;
    transition: border-color 0.3s ease;
}

.form-group input:focus {
    outline: none;
    border-color: #667eea;
}

.btn-login {
    width: 100%;
    padding: 0.75rem;
    background: #667eea;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 1rem;
}

.btn-login:hover {
    background: #5a67d8;
}

.alert {
    padding: 0.75rem;
    border-radius: 4px;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.alert.error {
    background-color: #fee;
    color: #c53030;
    border: 1px solid #fc8181;
}

.form-footer {
    text-align: center;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 2px solid #e2e8f0;
}

.form-footer p {
    color: #2d3748;
    margin-bottom: 0.75rem;
    font-size: 1rem;
    font-weight: 500;
}

.form-footer a {
    color: #4299e1;
    text-decoration: none;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    background: rgba(66, 153, 225, 0.1);
    padding: 0.5rem 1rem;
    border-radius: 8px;
    display: inline-block;
    margin-top: 0.5rem;
}

.form-footer a:hover {
    color: #3182ce;
    text-decoration: underline;
    background: rgba(66, 153, 225, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(66, 153, 225, 0.3);
}

.remember-me {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
}

.remember-me input[type="checkbox"] {
    width: auto;
    margin-right: 0.5rem;
}

.remember-me label {
    font-size: 0.95rem;
    color: #4a5568;
    font-weight: 500;
}

.forgot-password {
    font-size: 0.95rem;
    color: #4299e1;
    text-decoration: none;
    margin-left: auto;
    transition: all 0.3s ease;
    font-weight: 600;
    text-shadow: 0 1px 2px rgba(0,0,0,0.1);
    background: rgba(66, 153, 225, 0.1);
    padding: 0.25rem 0.5rem;
    border-radius: 4px;
}

.forgot-password:hover {
    color: #3182ce;
    text-decoration: underline;
    background: rgba(66, 153, 225, 0.2);
    transform: translateY(-1px);
}

.social-login {
    margin-top: 2rem;
}

.social-divider {
    text-align: center;
    color: #2d3748;
    font-size: 1rem;
    font-weight: 500;
    margin-bottom: 1.5rem;
    position: relative;
}

.social-divider::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 1px;
    background: #eee;
    z-index: 1;
}

.social-divider::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 20px;
    height: 20px;
    background: white;
    z-index: 2;
}

.social-buttons {
    display: flex;
    gap: 1rem;
}

.social-btn {
    flex: 1;
    padding: 0.875rem;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    background: white;
    color: #1a202c;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.social-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.social-btn.google:hover {
    border-color: #ea4335;
    color: #ea4335;
}

.social-btn.facebook:hover {
    border-color: #1877f2;
    color: #1877f2;
}

.social-btn i {
    font-size: 1.1rem;
}
</style>

 hop>

<div class="login-container">
    <div class="login-form">
        <h2>Đăng nhập</h2>
        
        <?php if (!empty($error)): ?>
            <div class="alert error">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['success']) && $_GET['success'] === 'registered'): ?>
            <div class="alert success">
                <i class="fas fa-check-circle"></i> Đăng ký thành công! Vui lòng đăng nhập.
            </div>
        <?php endif; ?>
        
        <form method="post" action="../../index.php?controller=Auth&action=login">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required 
                       value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                       placeholder="Nhập email">
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required 
                       placeholder="Nhập mật khẩu">
            </div>

            <div class="remember-me">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ghi nhớ đăng nhập</label>
                <a href="forgot_password.php" class="forgot-password">Quên mật khẩu?</a>
            </div>

            <button type="submit" class="btn-login">Đăng nhập</button>
        </form>

        <div class="social-login">
            <p class="social-divider">Hoặc đăng nhập với</p>
            <div class="social-buttons">
                <button type="button" class="social-btn google" onclick="socialLogin('google')">
                    <i class="fab fa-google"></i>
                    Google
                </button>
                <button type="button" class="social-btn facebook" onclick="socialLogin('facebook')">
                    <i class="fab fa-facebook-f"></i>
                    Facebook
                </button>
            </div>
        </div>

        <div class="form-footer">
            <p>Chưa có tài khoản?</p>
            <a href="register.php">Đăng ký ngay</a>
        </div>
    </div>
</div>

<script>
document.querySelector('form').addEventListener('submit', function(e) {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value;
    
    if (!email) {
        e.preventDefault();
        alert('Vui lòng nhập email');
        return;
    }
    
    if (password.length < 6) {
        e.preventDefault();
        alert('Mật khẩu phải có ít nhất 6 ký tự');
        return;
    }
});

function socialLogin(provider) {
    // Hiển thị thông báo đang phát triển
    alert(`Đăng nhập với ${provider} - Chức năng đang được phát triển!\n\nTrong thời gian chờ đợi, bạn có thể:\n1. Sử dụng email và mật khẩu để đăng nhập\n2. Đăng ký tài khoản mới nếu chưa có`);
    
    // Logic thực tế cho social login (khi đã có API)
    /*
    switch(provider) {
        case 'google':
            window.location.href = 'auth/google';
            break;
        case 'facebook':
            window.location.href = 'auth/facebook';
            break;
        case 'github':
            window.location.href = 'auth/github';
            break;
        default:
            console.log('Provider not supported');
    }
    */
}

// Thêm hiệu ứng khi click vào social buttons
document.querySelectorAll('.social-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        // Thêm hiệu ứng loading
        this.style.opacity = '0.7';
        this.style.cursor = 'not-allowed';
        
        setTimeout(() => {
            this.style.opacity = '1';
            this.style.cursor = 'pointer';
        }, 1000);
    });
});
</script>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
