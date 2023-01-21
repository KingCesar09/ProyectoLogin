<?php
require_once('config/db.php')

class UserModel {
    
    public function getAll() {
        // Obtener todos los usuarios
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        return $query->fetchAll();
    }

    public function get($id) {
        // Obtener un usuario específico por su ID
        $query = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        return $query->fetch();
    }

    public function create($data) {
        // Crear un nuevo usuario
        $query = $this->db->prepare('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
        $query->bindValue(':name', $data['name']);
        $query->bindValue(':email', $data['email']);
        $query->bindValue(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $query->execute();
        return $this->get($this->db->lastInsertId());
    }

    public function update($id, $data) {
        // Actualizar un usuario específico por su ID
        $query = $this->db->prepare('UPDATE users SET name = :name, email = :email WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->bindValue(':name', $data['name']);
        $query->bindValue(':email', $data['email']);
        $query->execute();
        return $this->get($id);
    }

    public function delete($id) {
        // Eliminar un usuario específico por su ID
        $query = $this->db->prepare('DELETE FROM users WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
        return true;
    }
}