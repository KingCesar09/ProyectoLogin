<?php

class UserController {
    private $userModel;
    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function getAll() {
        // Obtener todos los usuarios
        $users = $this->userModel->getAll();
        return json_encode($users);
    }

    public function get($id) {
        // Obtener un usuario específico por su ID
        $user = $this->userModel->get($id);
        return json_encode($user);
    }

    public function create($data) {
        // Crear un nuevo usuario
        $newUser = $this->userModel->create($data);
        return json_encode($newUser);
    }

    public function update($id, $data) {
        // Actualizar un usuario específico por su ID
        $updatedUser = $this->userModel->update($id, $data);
        return json_encode($updatedUser);
    }

    public function delete($id) {
        // Eliminar un usuario específico por su ID
        $deletedUser = $this->userModel->delete($id);
        return json_encode($deletedUser);
    }
}