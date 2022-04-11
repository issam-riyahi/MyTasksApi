<?php
namespace MVC;

use Exception;

class Controller{


    public $request;


    public $response;



    public function __construct()
    {
        $this->request = $GLOBALS['request'];
        $this->response = $GLOBALS['response'];
    }


    public function model($model){
        $file = MODELS . ucfirst($model)  . '.php';

        if(file_exists($file)){

            require_once $file;

            $model = str_replace('/', '', ucwords($model, '/'));

            if(class_exists($model)){
                return new $model;
            }
            else {
                throw new Exception(sprintf('{ %s } this model class not found', $model));
            }
        }
        else {
            throw new Exception(sprintf('{ %s } this file not found', $file));
        }
    }


    public function send($status = 200 , $msg){
        $this->response->setHeader(sprintf('HTTP/1.1 ' . $status . ' %s' , $this->response->getStatusCodeText($status)));
        $this->response->setContent($msg);
    }
}