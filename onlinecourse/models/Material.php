<?php
class Material
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getByLesson($lessonId)
    {
        $sql = 'SELECT * FROM materials WHERE lesson_id = :lesson_id ORDER BY uploaded_at DESC';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':lesson_id' => $lessonId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = 'INSERT INTO materials (lesson_id, filename, file_path, file_type, uploaded_at)
                VALUES (:lesson_id, :filename, :file_path, :file_type, NOW())';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':lesson_id' => $data['lesson_id'],
            ':filename' => $data['filename'],
            ':file_path' => $data['file_path'],
            ':file_type' => $data['file_type'],
        ]);
    }

    public function getByCourse($courseId)
    {
        $sql = 'SELECT m.*, l.title as lesson_title 
                FROM materials m 
                JOIN lessons l ON m.lesson_id = l.id 
                WHERE l.course_id = :course_id 
                ORDER BY l.order, m.uploaded_at';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':course_id' => $courseId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM materials WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    public function findById($id)
    {
        $sql = 'SELECT * FROM materials WHERE id = :id LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
