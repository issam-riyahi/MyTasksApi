<?php
namespace Http;

class Request {

    public $cookie ;

    public $request;

    public $file;


    public function __construct()
    {
        $this->cookie = $this->clean($_COOKIE);
        $this->request = ($_REQUEST);
        $this->file = $this->clean($_FILES);
        
    }

    public function get(string $key = ''){

        if($key  != '') {
            return $this->clean($_GET[$key]);
        }

        return $this->clean($_GET);
    }

    public function post(string $key = ''){
        if($key  != '') {
            return $this->clean($_POST[$key]);
        }

        return $this->clean($_POST);
    }






    public function input(string $key = ''){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);

        if($key != '') {
            return isset($request[$key]) ? $this->clean($request[$key]) : array();
        }
        return empty($request) ? array() : $request;
    }





    public function server(string $key = '') {
        return isset($_SERVER[strtoupper($key)]) ? $this->clean($_SERVER[strtoupper($key)]) : $this->clean($_SERVER);
    }





    public function getClientIp(){
        return $this->server('REMOTE_ADDR');
    }
    

    public function getUrl(){
        return $this->server('REQUEST_URI');
    }

    public function getMethod(){
        return $this->server('REQUEST_METHOD');
    }

    private function clean($data){
        if(is_array($data)){
            foreach($data as $key => $value){
                
                unset($data[$key]);

                $data[$this->clean($key) ] = $this->clean($value);

            }
        }
        else {
            $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
        }

        return $data;
    }

}