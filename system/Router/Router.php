<?php 
namespace Router;

use Exception;
use ValidateAuthenticat;

class Router {


    private $router = [];


    private $matchRouter = [];

    private $method;

    private $url;

    private $param = [];

    /**
     * 
     * class Responce 
     */
    private $response;


    private $request;

    public function __construct($url, $method)
    {
        $this->url = rtrim($url, '/');
        $this->method = $method;

        $this->response = $GLOBALS['response'];
        $this->request = $GLOBALS['request'];
        $this->param = array_merge($this->request->get(),$this->request->post(), $this->request->input());
    }


    public function get($pattern, $callback){
       return $this->addRoute('GET', $pattern, $callback);
    }



    public function post($pattern, $callback){
       return $this->addRoute('POST', $pattern, $callback);
    }

    public function put($pattern, $callback){
       return $this->addRoute('PUT', $pattern, $callback);
    }


    public function delete($pattern, $callback){
        return $this->addRoute('DELETE', $pattern, $callback);
    }



    public function addRoute($methode, $pattern, $callback ){
        $route = new Route($methode, $pattern, $callback);
        array_push($this->router, $route);
        return $route;
    }


    private function getMatchRouteByRequestMethod(){
        foreach($this->router as $value){
            if(strtoupper($this->method) == $value->getMethod()){
                
                array_push($this->matchRouter, $value);
            }
            
            
            
        }
    }


    private function getMatchRouterByPattern($pattern){
        $this->matchRouter = [];
        foreach($pattern as $value){
            if($this->dispatch(cleanUrl($this->url), $value->getPattern())){
                array_push($this->matchRouter, $value);
            }
        }
    }
    public function dispatch($uri, $pattern){
        $parseUrl = explode('?', $uri);
        $url = $parseUrl[0];
        // dd($parseUrl);
        // dd($url);
        // dd($url);
        preg_match_all('@:([\w]+)@', $pattern, $params, PREG_PATTERN_ORDER);
        // dd($params);
        
        $patternAsRegex = preg_replace_callback('@:([\w]+)@',[$this, 'convertPatternToRegex'],$pattern);

        if(substr($pattern, -1) === '/'){
            $patternAsRegex = $patternAsRegex . '?';
        }

        $patternAsRegex = '@^' . $patternAsRegex . '$@';

        if(preg_match($patternAsRegex, $url, $paramsValue)){
            array_shift($paramsValue);
            foreach($params[0] as $key => $value){
                $val = substr($value, 1);
                if($paramsValue[$val]){
                    $this->setParms($val, urlencode($paramsValue[$val])  );
                }
            }
            return true;
        }
        else{
            return false;
        }
    }


    private function convertPatternToRegex($matches){
        $key = str_replace(":", "", $matches[0]);
        return '(?P<' . $key . '>[a-zA-Z0-9_\-\.\!\~\*\\\'\(\)\:\@\&\=\$\+,%]+)';
    }

    private function setParms($key, $value){
        $this->param[$key] = $value;
    } 


    public function getRouter(){
        return $this->router;
    }


    public function run(){

        if(!is_array($this->router) && empty($this->router)){
            throw new Exception('NON-Object router set');
        }

        $this->getMatchRouteByRequestMethod(); 
        
        $this->getMatchRouterByPattern($this->matchRouter);
        
        if(!$this->matchRouter && empty($this->matchRouter) && $this->method !== 'OPTIONS'){
            $this->setNotFound();
        }
        else {
            foreach($this->matchRouter as $router){
               if($router->getMethod() === $this->request->getMethod() ){
                    
                    if(is_callable($router->getCallback())){
                    call_user_func($router->getCallback(), $this->param);
                    }
                    else {
                        $this->runController($router->getCallback(), $this->param, $router->getAuth());
                    } 
               }
                
            }
            
        }
    }

    private function runController($Controller, $params, $auth){
        $parts = explode('@', $Controller);
        $file = CONTROLLERS . ucfirst($parts[0]) . '.php';
        $fileAuth = CONTROLLERS . "Auth/ValidateAuthenticat.php";
        $valid = true;
        if($auth){

            require_once($fileAuth);
            $validateAuthController =  new ValidateAuthenticat();
            $valid = $validateAuthController->validateAuth();
        }
        
        if($valid){

        
        if(file_exists($file))
        {
            
            require_once($file);
            
            if(strpos($parts[0], '/')){
                $Controller = explode('/', $parts[0])[1];
                
            }
            else{

                $Controller = ucfirst($parts[0]);
            }
            // dd(class_exists($Controller));
            if(class_exists($Controller)){
                $Controller = new $Controller();
            }
            else {
                $this->setNotFound();
            }

            if(isset($parts[1])){
                $method = $parts[1];
                if(!method_exists($Controller, $method)){
                        $this->setNotFound();
                }
            }
            else{
                $method = 'index';
            }

            if(is_callable([$Controller, $method])){
                return  call_user_func([$Controller, $method], $params);
            }
            else{

                $this->setNotFound();
            }
            
            
        }
    }
    else{
        $this->setUnauthorized();
    }
        
            
    }

    private function setNotFound(){
        $this->response->sendStatus(400);
        $this->response->setContent(['error' => "Sorry the route not found", 'status_code' => 404]);
    }

    private function setUnauthorized(){
        $this->response->sendStatus(401);
        $this->response->setContent(['error' => 'Sorry Your are Unauthorized', 'status_code' => 401]);
    }
    public function getMatchRouter(){
        return $this->matchRouter;
    }


    public function getParam(){
        return $this->param;
    }
}   

