<?php
class EnrollmentController
{
    private function requireLogin()
    {
        if (empty($_SESSION['user_id'])) {
            header('Location: index.php?controller=Auth&action=login');
            exit;
        }
    }

    public function enroll()
    {
        $this->requireLogin();
        $courseId = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
        $studentId = (int)$_SESSION['user_id'];

        if ($courseId > 0) {
            $enrollmentModel = new Enrollment();
            $enrollmentModel->enroll($courseId, $studentId);
        }

        header('Location: index.php?controller=Enrollment&action=myCourses');
        exit;
    }

    public function myCourses()
    {
        $this->requireLogin();
        $studentId = (int)$_SESSION['user_id'];
        $enrollmentModel = new Enrollment();
        $courses = $enrollmentModel->getByStudent($studentId);

        $pageTitle = 'Khóa học của tôi';
        require __DIR__ . '/../views/student/my_courses.php';
    }

    public function progress()
    {
        $this->requireLogin();
        $courseId = isset($_GET['course_id']) ? (int)$_GET['course_id'] : 0;
        $studentId = (int)$_SESSION['user_id'];

        $enrollmentModel = new Enrollment();
        $courseModel = new Course();
        $lessonModel = new Lesson();

        $enrollment = $enrollmentModel->getOne($courseId, $studentId);
        $course = $courseModel->findById($courseId);
        $lessons = $lessonModel->getByCourse($courseId);

        if (!$enrollment || !$course) {
            http_response_code(404);
            echo 'Bạn chưa đăng ký khóa học này';
            return;
        }

        $pageTitle = 'Tiến độ khóa học - ' . $course['title'];
        require __DIR__ . '/../views/student/course_progress.php';
    }
}
