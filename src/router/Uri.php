<?php

class Uri {
    var $uri;
    var $method;
    var $function;
    var $matches;
    protected $request;
    protected $response;

    
    
    public function __construct($uri, $method, $function){
        $this->uri = $uri;
        $this->method = $method;
        $this->function = $function;
        
    }

    private function execFunction() {
        $this->parseRequest();
        $this->response = call_user_func_array($this->function, $this->matches);
    }

    public function match($url) {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->uri); //Evaluar si la URL es la misma registrada en el objecto.
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        if ($this->method != $_SERVER['REQUEST_METHOD'] && $this->method != "ANY") {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    public function call() {
        try {
            $this->request = $_REQUEST;
            $this->execFunction();
            $this->printResponse();
        } catch (Exception $ex) {
            echo "ERROR: " . $ex->getMessage();
        }
    }

    private function printResponse() {
        if (is_string($this->response)) {
            echo $this->response;
        } else if (is_object($this->response) || is_array($this->response)) {
            $res = new Respuesta();
            echo $res->json($this->response);
        }
    }

    private function parseRequest() {
        $this->request = new Request($this->request);
        $this->matches[] = $this->request;
    }
}