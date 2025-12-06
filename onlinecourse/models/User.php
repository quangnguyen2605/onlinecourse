<?php
require_once __DIR__ . '/../config/Database.php';

class User
{
    private $db;
    private $table = 'users';

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findByEmailOrUsername($identifier)
    {
        $sql = 'SELECT * FROM users WHERE email = :id OR username = :id LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $identifier]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id LIMIT 1';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $stmt = $this->db->query('SELECT * FROM users ORDER BY created_at DESC');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByRole($role)
    {
        $sql = 'SELECT * FROM users WHERE role = :role ORDER BY fullname';
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':role' => $role]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = 'INSERT INTO users (username, email, password, fullname, role, status, created_at) VALUES (:username, :email, :password, :fullname, :role, :status, NOW())';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':fullname' => $data['fullname'],
            ':role' => isset($data['role']) ? (int)$data['role'] : 0,
            ':status' => 'active',
        ]);
    }

    public function update($id, $data)
    {
        $sql = 'UPDATE users SET fullname = :fullname, email = :email WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $id,
            ':fullname' => $data['fullname'],
            ':email' => $data['email'],
        ]);
    }

    public function updateStatus($id, $status)
    {
        $sql = 'UPDATE users SET status = :status WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id, ':status' => $status]);
    }

    public function delete($id)
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
