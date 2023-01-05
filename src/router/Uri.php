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
}