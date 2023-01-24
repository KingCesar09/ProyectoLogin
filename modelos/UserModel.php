<?php

require_once 'config/db.php';

class UserModel extends db {
    protected $db;

    public function __construct(){
        $this->db = parent::conexion();
    }
    //Obtener todos los usuarios
    public function getAll() {
        $query = "SELECT * FROM users WHERE deleted = 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($users);
    }
    //Obtener un usuario por el ID
    public function get($id) {
        $query = "SELECT * FROM users WHERE id = :id AND deleted = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return json_encode($user);
    }
    //Crear un nuevo usuario
    public function create($data) {
        $query = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $stmt->execute();
        return json_encode(['message' => 'Usuario creado con exito']);
    }
    //Autenticar
    public function auth($data) {
        $query = "SELECT * FROM users WHERE email = :email AND deleted = 0";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $data['email']);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            return json_encode(['error' => 'Correo o contrasena invalida']);
        }
        if (password_verify($data['password'], $user['password'])) {
            return json_encode(['message' => 'Authentication successful']);
        }
        return json_encode(['error' => 'Correo o contrasena invalida']);
    }
    //Borrado logico
    public function delete($id) {
        $query = "UPDATE users SET deleted = 1 WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return json_encode(['message' => 'El usuario ha sido eliminado']);
    }
}