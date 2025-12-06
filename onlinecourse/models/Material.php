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

    public function delete($id)
    {
        $sql = 'DELETE FROM materials WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
