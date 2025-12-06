<?php
class Enrollment
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function enroll($courseId, $studentId)
    {
        $sql = 'INSERT INTO enrollments (course_id, student_id, enrolled_date, status, progress) VALUES (:course_id, :student_id, NOW(), :status, :progress)';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':course_id' => $courseId,
            ':student_id' => $studentId,
            ':status' => 'active',
            ':progress' => 0,
        ]);
    }

    public function getByStudent($studentId)
    {
        $sql = 'SELECT e.*, c.title, c.image FROM enrollments e JOIN courses c ON e.course_id = c.id WHERE e.student_id = :student_id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':student_id' => $studentId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOne($courseId, $studentId)
    {
        $sql = 'SELECT * FROM enrollments WHERE course_id = :course_id AND student_id = :student_id LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':course_id' => $courseId,
            ':student_id' => $studentId,
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProgress($courseId, $studentId, $progress)
    {
        $sql = 'UPDATE enrollments SET progress = :progress WHERE course_id = :course_id AND student_id = :student_id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':progress' => (int)$progress,
            ':course_id' => $courseId,
            ':student_id' => $studentId,
        ]);
    }
}
