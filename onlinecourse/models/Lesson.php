<?php
class Lesson
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getByCourse($courseId)
    {
        $sql = 'SELECT * FROM lessons WHERE course_id = :course_id ORDER BY `order` ASC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':course_id' => $courseId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = 'SELECT * FROM lessons WHERE id = :id LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = 'INSERT INTO lessons (course_id, title, content, video_url, `order`, created_at)
                VALUES (:course_id, :title, :content, :video_url, :order, NOW())';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':course_id' => $data['course_id'],
            ':title' => $data['title'],
            ':content' => $data['content'],
            ':video_url' => $data['video_url'],
            ':order' => $data['order'],
        ]);
    }

    public function update($id, $data)
    {
        $sql = 'UPDATE lessons SET title = :title, content = :content, video_url = :video_url, `order` = :order WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':title' => $data['title'],
            ':content' => $data['content'],
            ':video_url' => $data['video_url'],
            ':order' => $data['order'],
            ':id' => $id,
        ]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM lessons WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function markCompleted($lessonId, $studentId)
    {
        $sql = 'INSERT INTO lesson_progress (lesson_id, student_id, completed_at) 
                VALUES (:lesson_id, :student_id, NOW())
                ON DUPLICATE KEY UPDATE completed_at = NOW()';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':lesson_id' => $lessonId,
            ':student_id' => $studentId,
        ]);
    }

    public function getCompletedByStudent($courseId, $studentId)
    {
        $sql = 'SELECT l.* FROM lessons l 
                JOIN lesson_progress lp ON l.id = lp.lesson_id 
                WHERE l.course_id = :course_id AND lp.student_id = :student_id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':course_id' => $courseId,
            ':student_id' => $studentId,
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isCompleted($lessonId, $studentId)
    {
        $sql = 'SELECT 1 FROM lesson_progress WHERE lesson_id = :lesson_id AND student_id = :student_id LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':lesson_id' => $lessonId,
            ':student_id' => $studentId,
        ]);
        return $stmt->fetchColumn() !== false;
    }
}
