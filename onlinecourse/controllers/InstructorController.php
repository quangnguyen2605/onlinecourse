<?php
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Lesson.php';
require_once __DIR__ . '/../models/Material.php';
require_once __DIR__ . '/../models/Enrollment.php';
require_once __DIR__ . '/../models/User.php';

class InstructorController
{
    public function dashboard()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $courses = $courseModel->getByInstructor($_SESSION['user_id']);

        // Calculate statistics
        $totalCourses = count($courses);
        $publishedCourses = count(array_filter($courses, function($c) { return $c['status'] == 'published'; }));

        $pageTitle = 'Dashboard Giảng viên';
        require __DIR__ . '/../views/instructor/dashboard.php';
    }

    public function myCourses()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $courses = $courseModel->getByInstructor($_SESSION['user_id']);

        $pageTitle = 'Khóa học của tôi';
        require __DIR__ . '/../views/instructor/my_courses.php';
    }

    public function createCourse()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $categoryId = $_POST['category_id'] ?? '';
            $price = $_POST['price'] ?? 0;
            $durationWeeks = $_POST['duration_weeks'] ?? 0;
            $level = $_POST['level'] ?? 'beginner';

            if (empty($title) || empty($description)) {
                $error = 'Vui lòng nhập đầy đủ thông tin';
            } else {
                $courseModel = new Course();
                if ($courseModel->create([
                    'title' => $title,
                    'description' => $description,
                    'instructor_id' => $_SESSION['user_id'],
                    'category_id' => $categoryId,
                    'price' => $price,
                    'duration_weeks' => $durationWeeks,
                    'level' => $level,
                ])) {
                    $success = 'Tạo khóa học thành công';
                    $_POST = [];
                } else {
                    $error = 'Không thể tạo khóa học';
                }
            }
        }

        $pageTitle = 'Tạo khóa học mới';
        require __DIR__ . '/../views/instructor/course/create.php';
    }

    public function editCourse($courseId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $course = $courseModel->findById($courseId);

        if (!$course || $course['instructor_id'] != $_SESSION['user_id']) {
            die('Khóa học không tồn tại hoặc bạn không có quyền truy cập');
        }

        $categoryModel = new Category();
        $categories = $categoryModel->getAll();

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $description = trim($_POST['description'] ?? '');
            $categoryId = $_POST['category_id'] ?? '';
            $price = $_POST['price'] ?? 0;
            $durationWeeks = $_POST['duration_weeks'] ?? 0;
            $level = $_POST['level'] ?? 'beginner';

            if (empty($title) || empty($description)) {
                $error = 'Vui lòng nhập đầy đủ thông tin';
            } else {
                if ($courseModel->update($courseId, [
                    'title' => $title,
                    'description' => $description,
                    'category_id' => $categoryId,
                    'price' => $price,
                    'duration_weeks' => $durationWeeks,
                    'level' => $level,
                ])) {
                    $success = 'Cập nhật khóa học thành công';
                    $course = $courseModel->findById($courseId);
                } else {
                    $error = 'Không thể cập nhật khóa học';
                }
            }
        }

        $pageTitle = 'Chỉnh sửa khóa học';
        require __DIR__ . '/../views/instructor/course/edit.php';
    }

    public function deleteCourse($courseId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $course = $courseModel->findById($courseId);

        if (!$course || $course['instructor_id'] != $_SESSION['user_id']) {
            die('Khóa học không tồn tại hoặc bạn không có quyền truy cập');
        }

        if ($courseModel->delete($courseId)) {
            header('Location: index.php?controller=Instructor&action=myCourses');
            exit;
        }
    }

    public function manageLessons($courseId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $course = $courseModel->findById($courseId);

        if (!$course || $course['instructor_id'] != $_SESSION['user_id']) {
            die('Khóa học không tồn tại hoặc bạn không có quyền truy cập');
        }

        $lessonModel = new Lesson();
        $lessons = $lessonModel->getByCourse($courseId);

        $pageTitle = 'Quản lý bài học';
        require __DIR__ . '/../views/instructor/lessons/manage.php';
    }

    public function createLesson($courseId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $course = $courseModel->findById($courseId);

        if (!$course || $course['instructor_id'] != $_SESSION['user_id']) {
            die('Khóa học không tồn tại hoặc bạn không có quyền truy cập');
        }

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $videoUrl = trim($_POST['video_url'] ?? '');
            $order = $_POST['order'] ?? 1;

            if (empty($title)) {
                $error = 'Vui lòng nhập tên bài học';
            } else {
                $lessonModel = new Lesson();
                if ($lessonModel->create([
                    'course_id' => $courseId,
                    'title' => $title,
                    'content' => $content,
                    'video_url' => $videoUrl,
                    'order' => $order,
                ])) {
                    $success = 'Tạo bài học thành công';
                    $_POST = [];
                } else {
                    $error = 'Không thể tạo bài học';
                }
            }
        }

        $pageTitle = 'Tạo bài học mới';
        require __DIR__ . '/../views/instructor/lessons/create.php';
    }

    public function editLesson($lessonId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $lessonModel = new Lesson();
        $lesson = $lessonModel->findById($lessonId);

        if (!$lesson) {
            die('Bài học không tồn tại');
        }

        $courseModel = new Course();
        $course = $courseModel->findById($lesson['course_id']);

        if ($course['instructor_id'] != $_SESSION['user_id']) {
            die('Bạn không có quyền truy cập');
        }

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');
            $videoUrl = trim($_POST['video_url'] ?? '');
            $order = $_POST['order'] ?? 1;

            if (empty($title)) {
                $error = 'Vui lòng nhập tên bài học';
            } else {
                if ($lessonModel->update($lessonId, [
                    'title' => $title,
                    'content' => $content,
                    'video_url' => $videoUrl,
                    'order' => $order,
                ])) {
                    $success = 'Cập nhật bài học thành công';
                    $lesson = $lessonModel->findById($lessonId);
                } else {
                    $error = 'Không thể cập nhật bài học';
                }
            }
        }

        $pageTitle = 'Chỉnh sửa bài học';
        require __DIR__ . '/../views/instructor/lessons/edit.php';
    }

    public function uploadMaterial($lessonId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $lessonModel = new Lesson();
        $lesson = $lessonModel->findById($lessonId);

        if (!$lesson) {
            die('Bài học không tồn tại');
        }

        $courseModel = new Course();
        $course = $courseModel->findById($lesson['course_id']);

        if ($course['instructor_id'] != $_SESSION['user_id']) {
            die('Bạn không có quyền truy cập');
        }

        $error = '';
        $success = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
            $file = $_FILES['file'];
            $uploadDir = __DIR__ . '/../uploads/materials/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $filename = time() . '_' . basename($file['name']);
            $filePath = $uploadDir . $filename;

            if (move_uploaded_file($file['tmp_name'], $filePath)) {
                $materialModel = new Material();
                if ($materialModel->create([
                    'lesson_id' => $lessonId,
                    'filename' => $file['name'],
                    'file_path' => 'uploads/materials/' . $filename,
                    'file_type' => pathinfo($file['name'], PATHINFO_EXTENSION),
                    'file_size' => $file['size'],
                ])) {
                    $success = 'Tải tài liệu thành công';
                } else {
                    $error = 'Không thể lưu thông tin tài liệu';
                }
            } else {
                $error = 'Không thể tải file';
            }
        }

        $materialModel = new Material();
        $materials = $materialModel->getByLesson($lessonId);

        $pageTitle = 'Tải tài liệu học tập';
        require __DIR__ . '/../views/instructor/materials/upload.php';
    }

    public function studentsList($courseId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 1) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $course = $courseModel->findById($courseId);

        if (!$course || $course['instructor_id'] != $_SESSION['user_id']) {
            die('Khóa học không tồn tại hoặc bạn không có quyền truy cập');
        }

        $db = Database::getInstance()->getConnection();
        $sql = 'SELECT e.*, u.fullname, u.email FROM enrollments e 
                JOIN users u ON e.student_id = u.id 
                WHERE e.course_id = :course_id ORDER BY e.enrolled_date DESC';
        $stmt = $db->prepare($sql);
        $stmt->execute([':course_id' => $courseId]);
        $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pageTitle = 'Danh sách học viên';
        require __DIR__ . '/../views/instructor/students/list.php';
    }
}
