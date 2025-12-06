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
}
