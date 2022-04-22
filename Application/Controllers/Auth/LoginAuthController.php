<?php

use MVC\Controller;

class LoginAuthController extends Controller{
   
    public function Login(){
        $model = $this->model('user');
        $data = $model->validateLogin();

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