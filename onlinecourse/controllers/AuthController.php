<?php
require_once __DIR__ . '/../models/User.php';

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
                $_SESSION['user_fullname'] = $user['fullname'];

                // Redirect based on role
                if ($user['role'] == 2) { // Admin
                    header('Location: index.php?controller=Admin&action=dashboard');
                } elseif ($user['role'] == 1) { // Instructor
                    header('Location: index.php?controller=Instructor&action=dashboard');
                } else { // Student
                    header('Location: index.php?controller=Student&action=dashboard');
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
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $fullname = trim($_POST['fullname'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm_password'] ?? '';
            $role = $_POST['role'] ?? 0; // 0=student, 1=instructor

            // Validation
            if (empty($username) || empty($email) || empty($fullname) || empty($password)) {
                $error = 'Vui lòng nhập đầy đủ thông tin';
            } elseif (strlen($password) < 6) {
                $error = 'Mật khẩu phải có ít nhất 6 ký tự';
            } elseif ($password !== $confirm) {
                $error = 'Mật khẩu nhập lại không khớp';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Email không hợp lệ';
            } else {
                $userModel = new User();
                $existing = $userModel->findByEmailOrUsername($email);
                if ($existing) {
                    $error = 'Email đã được sử dụng';
                } else {
                    $created = $userModel->create([
                        'username' => $username,
                        'email' => $email,
                        'fullname' => $fullname,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'role' => (int)$role,
                    ]);
                    if ($created) {
                        $success = 'Đăng ký thành công! Vui lòng đăng nhập.';
                        $_POST = []; // Clear form
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

    public function profile()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $userModel = new User();
        $user = $userModel->findById($_SESSION['user_id']);

        if (!$user) {
            header('Location: index.php?controller=Auth&action=logout');
            exit;
        }

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fullname = trim($_POST['fullname'] ?? '');
            $email = trim($_POST['email'] ?? '');

            if (empty($fullname) || empty($email)) {
                $error = 'Vui lòng nhập đầy đủ thông tin';
            } else {
                if ($userModel->update($_SESSION['user_id'], [
                    'fullname' => $fullname,
                    'email' => $email,
                ])) {
                    $_SESSION['user_fullname'] = $fullname;
                    $success = 'Cập nhật thông tin thành công';
                    $user = $userModel->findById($_SESSION['user_id']);
                } else {
                    $error = 'Không thể cập nhật thông tin';
                }
            }
        }

        $pageTitle = 'Thông tin cá nhân';
        require __DIR__ . '/../views/auth/profile.php';
    }
}
