<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/Course.php';
require_once __DIR__ . '/../models/Category.php';
require_once __DIR__ . '/../models/Enrollment.php';
require_once __DIR__ . '/../models/Lesson.php';

class StudentController
{
    public function dashboard()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $enrollmentModel = new Enrollment();
        $enrollments = $enrollmentModel->getByStudent($_SESSION['user_id']);

        // Calculate statistics
        $totalCourses = count($enrollments);
        $completedCourses = count(array_filter($enrollments, function($e) { return $e['status'] == 'completed'; }));
        $inProgressCourses = count(array_filter($enrollments, function($e) { return $e['status'] == 'active'; }));

        $pageTitle = 'Dashboard Học viên';
        require __DIR__ . '/../views/student/dashboard.php';
    }

    public function myCourses()
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $enrollmentModel = new Enrollment();
        $enrollments = $enrollmentModel->getByStudent($_SESSION['user_id']);

        $pageTitle = 'Khóa học của tôi';
        require __DIR__ . '/../views/student/my_courses.php';
    }

    public function courseProgress($courseId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $courseModel = new Course();
        $course = $courseModel->findById($courseId);

        if (!$course) {
            die('Khóa học không tồn tại');
        }

        $enrollmentModel = new Enrollment();
        $enrollment = $enrollmentModel->getOne($courseId, $_SESSION['user_id']);

        if (!$enrollment) {
            die('Bạn chưa đăng ký khóa học này');
        }

        $lessonModel = new Lesson();
        $lessons = $lessonModel->getByCourse($courseId);

        $pageTitle = 'Tiến độ học tập';
        require __DIR__ . '/../views/student/course_progress.php';
    }

    public function lessonView($lessonId)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 0) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }

        $lessonModel = new Lesson();
        $lesson = $lessonModel->findById($lessonId);

        if (!$lesson) {
            die('Bài học không tồn tại');
        }

        // Check enrollment
        $enrollmentModel = new Enrollment();
        $enrollment = $enrollmentModel->getOne($lesson['course_id'], $_SESSION['user_id']);

        if (!$enrollment) {
            die('Bạn chưa đăng ký khóa học này');
        }

        $courseModel = new Course();
        $course = $courseModel->findById($lesson['course_id']);

        $pageTitle = 'Bài học';
        require __DIR__ . '/../views/student/lesson_view.php';
    }
}
