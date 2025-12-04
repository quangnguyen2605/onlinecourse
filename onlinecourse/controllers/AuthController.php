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
                header('Location: index.php');
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
                        header('Location: index.php?controller=Auth&action=login');
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
