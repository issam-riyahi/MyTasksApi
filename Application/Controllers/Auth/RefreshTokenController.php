<?php

use MVC\Controller;

class RefreshTokenController extends Controller {



    
    public function refreshToken($request){
        if(isset($request['userId'])){
            $userModel = $this->model('user');
            $data = $userModel->userById($request['userId']); 
            $arrayData = (array) $data;
            if(empty($arrayData)){
                $this->response->sendStatus(204);
                $this->response->setContent(['message' => 'invalid user']);
            }
            else{
                $token = $userModel->generateToken($data, SECRET);
                $this->response->sendStatus(200);
                $this->response->setContent(['message' => 'ok' , 'token' => $token]);
            }
        }
        else{
            $this->response->sendStatus(204);
            $this->response->setContent(['message' => 'invalid entries']);
        }
    }
}