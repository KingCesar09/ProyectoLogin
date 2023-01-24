<?php

require_once 'modelos/UserModel.php';

class UserController {
    protected $model;

    public function __construct() {
        $this->model = new UserModel();
    }

    public function getAll() {
        return $this->model->getAll();
    }

    public function get($id) {
        return $this->model->get($id);
    }

    public function create($data) {
        return $this->model->create($data);
    }

    public function auth($data) {
        return $this->model->auth($data);
    }

    public function delete($id) {
        return $this->model->delete($id);
    }

}