<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../config/Database.php';

class AdminController
{
    private function requireAdmin()
    {
        if (empty($_SESSION['user_id']) || (int)($_SESSION['user_role'] ?? 0) !== 2) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
    }

    public function dashboard()
    {
        $this->requireAdmin();
        $db = Database::getInstance()->getConnection();

        $stmt = $db->query('SELECT COUNT(*) as total FROM users WHERE role = 0');
        $students = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        $stmt = $db->query('SELECT COUNT(*) as total FROM users WHERE role = 1');
        $instructors = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        $stmt = $db->query('SELECT COUNT(*) as total FROM courses');
        $courses = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        $stmt = $db->query('SELECT COUNT(*) as total FROM enrollments');
        $enrollments = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        $pageTitle = 'Admin Dashboard';
        require __DIR__ . '/../views/admin/dashboard.php';
    }

    public function users()
    {
        $this->requireAdmin();
        $userModel = new User();
        $users = $userModel->getAll();
        $pageTitle = 'Quản lý người dùng';
        require __DIR__ . '/../views/admin/users/manage.php';
    }

    public function updateUserStatus()
    {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'] ?? '';
            $status = $_POST['status'] ?? '';
            $userModel = new User();
            $userModel->updateStatus($userId, $status);
        }
        header('Location: index.php?controller=Admin&action=users');
        exit;
    }

    public function deleteUser()
    {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'] ?? '';
            $userModel = new User();
            $userModel->delete($userId);
        }
        header('Location: index.php?controller=Admin&action=users');
        exit;
    }

    public function categories()
    {
        $this->requireAdmin();
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        $pageTitle = 'Danh mục khóa học';
        require __DIR__ . '/../views/admin/categories/list.php';
    }

    public function createCategory()
    {
        $this->requireAdmin();
        $pageTitle = 'Thêm danh mục';
        require __DIR__ . '/../views/admin/categories/create.php';
    }

    public function storeCategory()
    {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryModel = new Category();
            $categoryModel->create([
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
            ]);
        }
        header('Location: index.php?controller=Admin&action=categories');
        exit;
    }

    public function editCategory()
    {
        $this->requireAdmin();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $categoryModel = new Category();
        $category = $categoryModel->findById($id);
        $pageTitle = 'Sửa danh mục';
        require __DIR__ . '/../views/admin/categories/edit.php';
    }

    public function updateCategory()
    {
        $this->requireAdmin();
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id > 0) {
            $categoryModel = new Category();
            $categoryModel->update($id, [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
            ]);
        }
        header('Location: index.php?controller=Admin&action=categories');
        exit;
    }

    public function deleteCategory()
    {
        $this->requireAdmin();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        if ($id > 0) {
            $categoryModel = new Category();
            $categoryModel->delete($id);
        }
        header('Location: index.php?controller=Admin&action=categories');
        exit;
    }

    public function approveCourses()
    {
        $this->requireAdmin();
        $db = Database::getInstance()->getConnection();
        $stmt = $db->query('SELECT c.*, u.fullname as instructor_name FROM courses c 
                           JOIN users u ON c.instructor_id = u.id 
                           WHERE c.approved = 0 OR c.status = "draft"
                           ORDER BY c.created_at DESC');
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pageTitle = 'Duyệt phê duyệt khóa học';
        require __DIR__ . '/../views/admin/courses/list.php';
    }

    public function approveCourse()
    {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseId = $_POST['course_id'] ?? '';
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE courses SET approved = 1, status = "published" WHERE id = :id');
            $stmt->execute([':id' => $courseId]);
        }
        header('Location: index.php?controller=Admin&action=approveCourses');
        exit;
    }

    public function rejectCourse()
    {
        $this->requireAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseId = $_POST['course_id'] ?? '';
            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare('UPDATE courses SET status = "rejected" WHERE id = :id');
            $stmt->execute([':id' => $courseId]);
        }
        header('Location: index.php?controller=Admin&action=approveCourses');
        exit;
    }

    public function statistics()
    {
        $this->requireAdmin();
        $db = Database::getInstance()->getConnection();

        $stmt = $db->query('SELECT c.name, COUNT(e.id) as total_enrollments 
                           FROM categories c 
                           LEFT JOIN courses co ON c.id = co.category_id 
                           LEFT JOIN enrollments e ON co.id = e.course_id 
                           GROUP BY c.id, c.name');
        $categoryStats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = $db->query('SELECT u.fullname, COUNT(c.id) as course_count, COUNT(e.id) as student_count 
                           FROM users u 
                           LEFT JOIN courses c ON u.id = c.instructor_id 
                           LEFT JOIN enrollments e ON c.id = e.course_id 
                           WHERE u.role = 1 
                           GROUP BY u.id, u.fullname');
        $instructorStats = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pageTitle = 'Thống kê hệ thống';
        require __DIR__ . '/../views/admin/statistics.php';
    }
}
