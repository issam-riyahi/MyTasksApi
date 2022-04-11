<?php
namespace Router;

use Exception;

final class Route {

    private $method;


    private $pattern ;


    private $callback;


    private $listMethod = ['GET', 'POST', 'PUT', 'DELETE', 'OPTION'];

    public function __construct(string $method, $pattern, $callback)
    {
        $this->method = $this->validatMethode(strtoupper($method));
        $this->pattern = cleanUrl($pattern);
        $this->callback = $callback;   
    }

    public function validatMethode($method){
        if(in_array($method, $this->listMethod)){
            return $method;
        }
        throw new Exception('Invalid Method name'); 
    }

    public function getMethod(){
        return $this->method;
    }

    public function getPattern(){
        return $this->pattern;
    }

    public function getCallback(){
        return $this->callback;
    }
}