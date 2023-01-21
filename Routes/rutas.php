<?php

function rutas() {
    $controller = new UserController();
    //handle GET request to /user
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/user') {
        echo $controller->getAll();
        return;
    }
    //handle GET request to /user/id
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/^\/user\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $id = $matches[1];
        echo $controller->get($id);
        return;
    }

    // handle POST request to /user
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === '/user') {
        $data = json_decode(file_get_contents('php://input'), true);
        echo $controller->create($data);
        return;
    }

    // handle PATCH request to /user/id
    if ($_SERVER['REQUEST_METHOD'] === 'PATCH' && preg_match('/^\/user\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $id = $matches[1];
        $data = json_decode(file_get_contents('php://input'), true);
        echo $controller->update($id, $data);
        return;
    }

    // handle DELETE request to /user/id
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE' && preg_match('/^\/user\/(\d+)$/', $_SERVER['REQUEST_URI'], $matches)) {
        $id = $matches[1];
        echo $controller->delete($id);
        return;
    }

    http_response_code(404);
}


