<?php
class AuthController
{
    public function login()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identifier = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            $userModel = new User();
            $user = $userModel->findByEmailOrUsername($identifier);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = (int)$user['role'];
                $_SESSION['user_name'] = $user['fullname'];
                $_SESSION['user_email'] = $user['email'];
                
                // Chuyển hướng theo vai trò
                if ((int)$user['role'] === 0) {
                    // Học viên
                    header('Location: views/student/dashboard.php');
                } elseif ((int)$user['role'] === 1) {
                    // Giảng viên
                    header('Location: views/instructor/dashboard.php');
                } else {
                    // Admin
                    header('Location: views/admin/dashboard.php');
                }
                exit;
            } else {
                $error = 'Email/Tài khoản hoặc mật khẩu không đúng';
            }
        }

        $pageTitle = 'Đăng nhập';
        require __DIR__ . '/../views/auth/login.php';
    }

    public function register()
    {
        $error = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $fullname = trim($_POST['fullname'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm_password'] ?? '';

            if ($password !== $confirm) {
                $error = 'Mật khẩu nhập lại không khớp';
            } elseif ($username === '' || $email === '' || $fullname === '' || $password === '') {
                $error = 'Vui lòng nhập đầy đủ thông tin';
            } else {
                $userModel = new User();
                $existing = $userModel->findByEmailOrUsername($email);
                if ($existing) {
                    $error = 'Email đã được sử dụng';
                } else {
                    $hash = password_hash($password, PASSWORD_DEFAULT);
                    $created = $userModel->create([
                        'username' => $username,
                        'email' => $email,
                        'fullname' => $fullname,
                        'password' => $hash,
                        'role' => 0,
                    ]);
                    if ($created) {
                        header('Location: ../views/auth/login.php?success=registered');
                        exit;
                    } else {
                        $error = 'Không thể tạo tài khoản';
                    }
                }
            }
        }

        $pageTitle = 'Đăng ký';
        require __DIR__ . '/../views/auth/register.php';
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
