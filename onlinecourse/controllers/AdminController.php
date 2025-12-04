<?php
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

        $totalUsers = (int)$db->query('SELECT COUNT(*) FROM users')->fetchColumn();
        $totalCourses = (int)$db->query('SELECT COUNT(*) FROM courses')->fetchColumn();
        $totalEnrollments = (int)$db->query('SELECT COUNT(*) FROM enrollments')->fetchColumn();

        $pageTitle = 'Admin Dashboard';
        require __DIR__ . '/../views/admin/dashboard.php';
    }

    // Quản lý người dùng (xem danh sách)
    public function users()
    {
        $this->requireAdmin();
        $userModel = new User();
        $users = $userModel->getAll();
        $pageTitle = 'Quản lý người dùng';
        require __DIR__ . '/../views/admin/users/manage.php';
    }

    public function toggleUserStatus()
    {
        $this->requireAdmin();
        $userId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($userId > 0) {
            $userModel = new User();
            $user = $userModel->findById($userId);
            if ($user) {
                $newStatus = $user['status'] === 'active' ? 'inactive' : 'active';
                $userModel->updateStatus($userId, $newStatus);
                $_SESSION['success'] = 'Cập nhật trạng thái người dùng thành công';
            }
        }
        
        header('Location: index.php?controller=Admin&action=users');
        exit;
    }

    public function deleteUser()
    {
        $this->requireAdmin();
        $userId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($userId > 0) {
            $userModel = new User();
            $userModel->delete($userId);
            $_SESSION['success'] = 'Xóa người dùng thành công';
        }
        
        header('Location: index.php?controller=Admin&action=users');
        exit;
    }

    // Quản lý danh mục khóa học
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

    // Quản lý duyệt khóa học
    public function pendingCourses()
    {
        $this->requireAdmin();
        $courseModel = new Course();
        $courses = $courseModel->getPendingApproval();
        $pageTitle = 'Khóa học chờ duyệt';
        require __DIR__ . '/../views/admin/courses/pending.php';
    }

    public function approveCourse()
    {
        $this->requireAdmin();
        $courseId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($courseId > 0) {
            $courseModel = new Course();
            $courseModel->updateStatus($courseId, 'approved');
            $_SESSION['success'] = 'Duyệt khóa học thành công';
        }
        
        header('Location: index.php?controller=Admin&action=pendingCourses');
        exit;
    }

    public function rejectCourse()
    {
        $this->requireAdmin();
        $courseId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        if ($courseId > 0) {
            $courseModel = new Course();
            $courseModel->updateStatus($courseId, 'rejected');
            $_SESSION['success'] = 'Từ chối khóa học thành công';
        }
        
        header('Location: index.php?controller=Admin&action=pendingCourses');
        exit;
    }

    // Thống kê chi tiết
    public function statistics()
    {
        $this->requireAdmin();
        $db = Database::getInstance()->getConnection();

        // Basic stats
        $totalUsers = (int)$db->query('SELECT COUNT(*) FROM users')->fetchColumn();
        $totalCourses = (int)$db->query('SELECT COUNT(*) FROM courses')->fetchColumn();
        $totalEnrollments = (int)$db->query('SELECT COUNT(*) FROM enrollments')->fetchColumn();
        
        // Users by role
        $students = (int)$db->query('SELECT COUNT(*) FROM users WHERE role = 0')->fetchColumn();
        $instructors = (int)$db->query('SELECT COUNT(*) FROM users WHERE role = 1')->fetchColumn();
        $admins = (int)$db->query('SELECT COUNT(*) FROM users WHERE role = 2')->fetchColumn();
        
        // Courses by status
        $approvedCourses = (int)$db->query('SELECT COUNT(*) FROM courses WHERE status = "approved"')->fetchColumn();
        $pendingCourses = (int)$db->query('SELECT COUNT(*) FROM courses WHERE status = "pending"')->fetchColumn();
        
        // Recent activity
        $recentEnrollments = $db->query('SELECT e.*, u.fullname, c.title FROM enrollments e 
                                        JOIN users u ON e.student_id = u.id 
                                        JOIN courses c ON e.course_id = c.id 
                                        ORDER BY e.enrolled_date DESC LIMIT 10')
                                        ->fetchAll(PDO::FETCH_ASSOC);
        
        $recentCourses = $db->query('SELECT c.*, u.fullname as instructor_name FROM courses c 
                                     JOIN users u ON c.instructor_id = u.id 
                                     ORDER BY c.created_at DESC LIMIT 10')
                                     ->fetchAll(PDO::FETCH_ASSOC);

        $stats = [
            'totalUsers' => $totalUsers,
            'totalCourses' => $totalCourses,
            'totalEnrollments' => $totalEnrollments,
            'students' => $students,
            'instructors' => $instructors,
            'admins' => $admins,
            'approvedCourses' => $approvedCourses,
            'pendingCourses' => $pendingCourses,
            'recentEnrollments' => $recentEnrollments,
            'recentCourses' => $recentCourses
        ];

        $pageTitle = 'Thống kê hệ thống';
        require __DIR__ . '/../views/admin/statistics/index.php';
    }
}
