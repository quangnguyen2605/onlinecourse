<?php
class CourseController
{
    private function requireInstructor()
    {
        if (empty($_SESSION['user_id']) || (int)($_SESSION['user_role'] ?? 0) !== 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
    }

    public function index()
    {
        $courseModel = new Course();
        $categoryModel = new Category();

        $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
        $categoryId = isset($_GET['category_id']) ? $_GET['category_id'] : null;

        // Only show approved courses to general users
        $courses = $courseModel->searchApproved($keyword, $categoryId);
        $categories = $categoryModel->getAll();

        $pageTitle = 'Danh sách khóa học';
        require __DIR__ . '/../views/courses/index.php';
    }

    public function detail()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $courseModel = new Course();
        $enrollmentModel = new Enrollment();
        $lessonModel = new Lesson();
        $materialModel = new Material();

        // Lấy thông tin khóa học với tên giảng viên và danh mục
        $course = $courseModel->getCourseWithInstructor($id);
        
        if (!$course) {
            $_SESSION['error'] = 'Khóa học không tồn tại';
            header('Location: index.php?controller=Course&action=index');
            exit;
        }

        // Kiểm tra xem người dùng đã đăng ký chưa
        $isEnrolled = false;
        if (isset($_SESSION['user_id'])) {
            $isEnrolled = $enrollmentModel->isEnrolled($_SESSION['user_id'], $id);
        }

        // Lấy danh sách bài học
        $lessons = $lessonModel->getByCourse($id);
        
        // Lấy tài liệu cho khóa học
        $materials = $materialModel->getByCourse($id);

        $pageTitle = $course['title'];
        require __DIR__ . '/../views/courses/detail.php';
    }

    // Giảng viên: khóa học của tôi
    public function myCourses()
    {
        $this->requireInstructor();
        $instructorId = (int)$_SESSION['user_id'];
        $courseModel = new Course();
        $courses = $courseModel->getByInstructor($instructorId);

        $pageTitle = 'Khóa học của tôi (Giảng viên)';
        require __DIR__ . '/../views/instructor/my_courses.php';
    }

    public function create()
    {
        $this->requireInstructor();
        $categoryModel = new Category();
        $categories = $categoryModel->getAll();
        $pageTitle = 'Tạo khóa học mới';
        require __DIR__ . '/../views/instructor/course/create.php';
    }

    public function store()
    {
        $this->requireInstructor();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $courseModel = new Course();

            $data = [
                'title' => $_POST['title'] ?? '',
                'description' => $_POST['description'] ?? '',
                'instructor_id' => (int)$_SESSION['user_id'],
                'category_id' => (int)($_POST['category_id'] ?? 0),
                'price' => (float)($_POST['price'] ?? 0),
                'duration_weeks' => (int)($_POST['duration_weeks'] ?? 0),
                'level' => $_POST['level'] ?? 'Beginner',
                'image' => $_POST['image'] ?? '',
            ];

            $courseModel->create($data);
        }

        header('Location: index.php?controller=Course&action=myCourses');
        exit;
    }

    public function edit()
    {
        $this->requireInstructor();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        $courseModel = new Course();
        $categoryModel = new Category();
        $course = $courseModel->findById($id);
        $categories = $categoryModel->getAll();

        $pageTitle = 'Chỉnh sửa khóa học';
        require __DIR__ . '/../views/instructor/course/edit.php';
    }

    public function update()
    {
        $this->requireInstructor();
        $id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id > 0) {
            $courseModel = new Course();
            $data = [
                'title' => $_POST['title'] ?? '',
                'description' => $_POST['description'] ?? '',
                'category_id' => (int)($_POST['category_id'] ?? 0),
                'price' => (float)($_POST['price'] ?? 0),
                'duration_weeks' => (int)($_POST['duration_weeks'] ?? 0),
                'level' => $_POST['level'] ?? 'Beginner',
                'image' => $_POST['image'] ?? '',
            ];
            $courseModel->update($id, $data);
        }

        header('Location: index.php?controller=Course&action=myCourses');
        exit;
    }

    public function delete()
    {
        $this->requireInstructor();
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if ($id > 0) {
            $courseModel = new Course();
            $courseModel->delete($id);
        }

        header('Location: index.php?controller=Course&action=myCourses');
        exit;
    }

    // Danh sách học viên đã đăng ký một khóa học + tiến độ
    public function students()
    {
        $this->requireInstructor();
        $courseId = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;

        $courseModel = new Course();
        $enrollmentModel = new Enrollment();
        $userModel = new User();

        $course = $courseModel->findById($courseId);

        $db = Database::getInstance()->getConnection();
        $sql = 'SELECT e.*, u.fullname, u.email FROM enrollments e JOIN users u ON e.student_id = u.id WHERE e.course_id = :course_id';
        $stmt = $db->prepare($sql);
        $stmt->execute([':course_id' => $courseId]);
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pageTitle = 'Học viên đăng ký - ' . ($course['title'] ?? '');
        require __DIR__ . '/../views/instructor/students/list.php';
    }
}
