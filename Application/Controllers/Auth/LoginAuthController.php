<?php

use MVC\Controller;

class LoginAuthController extends Controller{
   
    public function login($request){
        // var_dump($request);
        $model = $this->model('user');
        $data = $model->validateLogin($request);

        if(!empty($data)){
            $jwt = $model->generateToken($data);
            $this->response->sendStatus(200);
            $this->response->setContent(['jwt' => $jwt, 'data' => $data ]);

        }
        else{
            $this->response->sendStatus(204);
            $this->response->setContent(['message' => 'login faild']);
        }
    }

}