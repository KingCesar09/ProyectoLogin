<?php

require_once 'controllers/userController.php';

function router() {
    $controller = new UserController();
    //handle GET request to /user
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/user') {
        echo $controller->getAll();
        return;
    }
    //handle GET request to /user/index
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/^\/user\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        echo $controller->get($index);
        return;
    }
    // handle POST request to /user/create
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/user/create') {
        $data = json_decode(file_get_contents('php://input'), true);
        echo $controller->create($data);
        return;
    }
    // handle POST request to /auth
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/auth') {
        $data = json_decode(file_get_contents('php://input'), true);
        echo $controller->auth($data);
        return;
    }
    // handle DELETE request to /user/delete
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && preg_match('/^\/user\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $index = $matches[1];
        echo $controller->delete($index);
        return;
    }

    http_response_code(404);
}


